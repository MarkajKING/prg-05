<?php

namespace App\Http\Controllers;

use App\Models\Starwars_part;
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

        $starwarsParts = Starwars_part::all();

        $auth = auth()->check();

        return view('index', compact('headTitle',
        'auth',
        'starwarsParts'));
    }
}
