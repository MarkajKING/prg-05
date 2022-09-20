<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function show()
    {
        $headTitle = 'About';
            return view('about',
                compact('headTitle'));
    }
}
