<?php

namespace App\Http\Middleware;

use App\Models\Tracker;
use Closure;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackVisit
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        Tracker::create([
            'page' => $request->path(),
            'ip' => $request->ip(),
            'method' => $request->method(),
            'route_name' => $request->route()?->getName(),
            'device' => $this->device($request->userAgent()),
            'user_agent' => mb_substr((string) $request->userAgent(), 0, 255),
            'status' => $response->getStatusCode(),
            'meta' => $this->meta($request),
            'visited_at' => now(),
        ]);

        return $response;
    }

    private function device(?string $userAgent): string
    {
        $userAgent = (string) $userAgent;

        if (preg_match('/iPad|Tablet/i', $userAgent)) {
            return 'tablet';
        }

        if (preg_match('/Mobile|Android|iPhone/i', $userAgent)) {
            return 'mobile';
        }

        return 'desktop';
    }

    private function meta(Request $request): ?array
    {
        $meta = [];

        $printer = $request->route('printer');
        if ($printer !== null) {
            $meta['printer_id'] = $printer instanceof Model ? $printer->getKey() : (int) $printer;
        }

        if ($request->filled('brand')) {
            $meta['brand'] = $request->query('brand');
        }

        $category = $request->route('category');
        if ($category !== null) {
            $meta['category'] = $category instanceof \BackedEnum ? $category->value : $category;
        }

        return $meta ?: null;
    }
}