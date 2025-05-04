<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function post(Request $request)
    {
        $posts = Post::with(['category', 'author'])
            ->latest()
            ->filter($request->only(['search', 'category', 'author']))
            ->paginate(10)
            ->withQueryString();

        $cat = Category::all();

        return view('posts', compact('posts', 'cat'));
    }
}
