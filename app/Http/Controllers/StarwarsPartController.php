<?php

namespace App\Http\Controllers;

use App\Models\StarwarsPart;
use App\Models\Tag;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
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
        $tags = Tag::all();

        return view('index',
            compact('starwarsParts',
                'headTitle', 'tags'));

    }

    public function create()
    {
        $headTitle = 'Make Starwars Part';
        $tags = Tag::all();
        return view('makepart',
            compact('headTitle',
                'tags'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'film' => 'required',
            'description' => 'required',
            'image' => 'nullable',
            'tags' => 'required'
        ]);

        $data['user_id'] = Auth::user()->id;

        $starwarsPart = StarwarsPart::create($data);

        $starwarsPart->tags()->attach($request->input('tags'));

        return redirect(route('starwars-part.index'));

    }

    public function destroy($id)
    {
        $starwarsPart = StarwarsPart::find($id);
        $starwarsPart->delete();

        return redirect(route('starwars-part.index'));
    }

    public function edit(StarwarsPart $starwarsPart)
    {
        $headTitle = 'Edit your Starwars Part';
        $tags = Tag::all();
        if ($starwarsPart->user_id === Auth::id()) {
            return view('editpart',
                compact('starwarsPart',
                    'headTitle',
                    'tags'));
        } else {
            return redirect(route('starwars-part.index'));
        }

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'film' => 'required',
            'description' => 'required',
            'image' => 'nullable',
            'tags' => 'required'
        ]);


        $starwarsPart = StarwarsPart::find($id);
        $starwarsPart->update($request->all());

        $starwarsPart->tags()->sync($request->input('tags'));

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


