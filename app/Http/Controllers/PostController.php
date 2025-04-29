<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\post;
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
