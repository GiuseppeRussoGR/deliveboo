<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Type;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $types = Type::all();
        return view('home', compact('types'));
    }
}
