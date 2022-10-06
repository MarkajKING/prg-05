<?php

namespace App\Http\Controllers;

use App\Models\StarwarsPart;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $headTitle = 'Star Wars Parts';

        $starwarsParts = StarwarsPart::all();

        $auth = auth()->check();

        return view('index', compact('headTitle',
        'auth',
        'starwarsParts'));
    }
}
