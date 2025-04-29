<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use Illuminate\Http\Request;

class PortoController extends Controller
{
    public function porto()
    {
        $porto = Portofolio::all();
        return view('portofolio', compact('porto'));
    }
}
