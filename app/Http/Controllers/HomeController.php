<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Type;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     * @param Type $type
     * @return View
     */
    public function index(Type $type): View
    {
        $types = $type->all();
        return view('home', compact('types'));
    }
}
