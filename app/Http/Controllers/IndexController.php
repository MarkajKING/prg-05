<?php

namespace App\Http\Controllers;

use App\Models\StarwarsPart;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function show()
    {
        $auth = auth()->check();

        $headTitle = 'Star Wars Parts';

        $starwarsParts = StarwarsPart::all();

        return view('index',
            compact('headTitle',
            'starwarsParts',
            'auth'));
    }
}
