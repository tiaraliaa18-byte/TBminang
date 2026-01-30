<?php

namespace App\Http\Controllers;

use App\Models\Food;

class HomeController extends Controller
{
    public function index()
    {
        $foods = Food::all();
        return view('user', compact('foods'));
    }
}
