<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use Illuminate\Http\Request;

class SinglePortoController extends Controller
{
    public function single(Portofolio $porto)
    {
        $relatedProject = Portofolio::where('id', '!=', $porto->id)
            ->latest()
            ->take(3)
            ->get();
        return view('porto', compact('porto', 'relatedProject'));
    }
}
