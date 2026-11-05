<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public function handle(Request $request, Closure $next): Response
    {
        $default = config('locales.default');
        $supported = array_keys(config('locales.supported'));

        $lang = $request->query('lang');

        if (is_string($lang) && in_array($lang, $supported, true)) {
            $request->session()->put('lang', $lang);
        }

        $locale = $request->session()->get('lang', $default);

        if (!in_array($locale, $supported, true)) {
            $locale = $default;
        }

        app()->setLocale($locale);

        return $next($request);
    }
}