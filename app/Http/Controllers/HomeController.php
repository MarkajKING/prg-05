<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function show()
    {
        $headTitle = 'Home';
        return view('home',
            compact('headTitle',));
    }
}
