<?php

namespace App\Http\Controllers;

use App\Models\Starwars_part;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function show()
    {
        $headTitle = 'Star Wars Parts';

        $starwarsParts = Starwars_part::all();

        return view('index',
            compact('headTitle',
            'starwarsParts'));
    }
}
