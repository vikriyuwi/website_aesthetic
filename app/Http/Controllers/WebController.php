<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function login(Request $request)
    {
        return view('login');
    }

    public function register(Request $request)
    {
        return view('register');
    }

    public function artist(Request $request)
    {
        return view('artist');
    }

    public function explore(Request $request)
    {
        return view('explore');
    }

    public function landing(Request $request)
    {
        return view('landing');
    }

}
