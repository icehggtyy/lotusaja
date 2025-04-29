<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SinglePostController extends Controller
{
    public function single(Post $post)
    {
        $categoryId = $post->category->id;
        // Ambil post lain dengan kategori yang sama, kecuali post yang sedang dibuka
        $relatedPosts = Post::where('category_id', $categoryId)
            ->where('id', '!=', $post->id)
            ->latest()
            ->take(3)
            ->get();

        return view('post', compact('post', 'relatedPosts'));
    }
}
