<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
   

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        print_r("dhfhdgfdfg");die;
        return view('home');
    }

    public function blog()
    {
        return view('frontend/blog');
    }
}
