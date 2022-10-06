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
        $starwarsParts = StarwarsPart::all();

        return view('index',
            compact('starwarsParts'));
    }

    public function create()
    {
        return view('makepart');
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

        $starwarsPart = StarwarsPart::find($id);

        return view(route('editpart'),
            compact('starwarsPart'));
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

        return redirect('index');
    }

    public function show($id)
    {
        $starwarsPart = StarwarsPart::find($id);


    }
}


