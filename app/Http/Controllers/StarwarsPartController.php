<?php

namespace App\Http\Controllers;

use App\Models\StarwarsPart;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class StarwarsPartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $headTitle = 'StarWars Parts';
        $starwarsParts = StarwarsPart::all();

        return view('index',
            compact('starwarsParts',
            'headTitle'));

    }

    public function create()
    {
        $headTitle = 'Make Starwars Part';
        return view('makepart',
            compact('headTitle'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'film' => 'required',
            'description' => 'required',
            'image' => 'nullable'
        ]);


        StarwarsPart::create($request->all());

        return redirect(route('starwars-part.index'));

    }

    public function destroy($id)
    {
        $starwarsPart = StarwarsPart::find($id);
        $starwarsPart->delete();

        return redirect(route('starwars-part.index'));
    }

    public
    function edit($id)
    {
        $headTitle = 'Edit your Starwars Part';
        $starwarsPart = StarwarsPart::find($id);

        return view('editpart',
            compact('starwarsPart',
            'headTitle'));
    }

    public
    function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'film' => 'required',
            'description' => 'required',
            'image' => 'nullable'
        ]);


        $starwarsPart = StarwarsPart::find($id);
        $starwarsPart->update($request->all());
        $starwarsPart->save();

        return redirect(route('starwars-part.index'));
    }

    public function show($id)
    {
        $headTitle = 'Details';
        $starwarsPart = StarwarsPart::find($id);

        return view('starwarsPartDetails',
            compact('headTitle',
                'starwarsPart'));


    }
}


