<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        $posts = Blog::query()
            ->with(['category', 'filters'])
            ->where('user_id', $user->id)
            ->orderByDesc('dt_created')
            ->paginate(5);

        return view('dashboard', compact('user', 'posts'));
    }
}