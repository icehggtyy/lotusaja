<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\Portofolio;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index()
    {
        $portofolios = Portofolio::latest()->take(3)->get();
        $posts = Post::latest()->take(3)->get();
        return view('welcome', compact('portofolios', 'posts'));
    }
}
