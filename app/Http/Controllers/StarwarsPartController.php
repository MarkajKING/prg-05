<?php

namespace App\Http\Controllers;

use App\Models\StarwarsPart;
use App\Models\Tag;
use App\Models\User;
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
        $restNumber = 3 - Auth::user()->count;

        if (Auth::user()->count >= 3) {
            $errorMessage = '';
        } else {
            $errorMessage = "Bekijk nog {$restNumber} keer de detail pagina voordat je een Starwars Part kan maken";
        }

        $headTitle = 'StarWars Parts';
        $starwarsParts = StarwarsPart::where('show', '=', '1')->get();
        $tags = Tag::all();

        return view('index',
            compact('starwarsParts',
                'headTitle', 'tags', 'errorMessage'));

    }

    public function create()
    {
        if (Auth::user()->count >= 3) {
            $headTitle = 'Make Starwars Part';
            $tags = Tag::all();
            return view('makepart',
                compact('headTitle',
                    'tags'));
        } else {
            return redirect(route('starwars-part.index'));
        }
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
        if ($starwarsPart->user_id === Auth::id()) {
            $starwarsPart->delete();
        }

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

    public function show(StarwarsPart $starwarsPart)
    {
        $this->detailCount();

        $headTitle = 'Details';

        return view('starwarsPartDetails',
            compact('headTitle',
                'starwarsPart'));
    }


    public function detailCount()
    {
        $userId = Auth::id();
        $user = User::find($userId);
        $number = $user->count;
        $newNumber = $number + 1;
        $user->count = $newNumber;
        $user->save();
    }

    public function enable(StarwarsPart $starwarsPart)
    {
        $currentState = $starwarsPart->show;
        if ($currentState)
        {
            $newState = false;
        } else
        {
            $newState = true;
        }

        $starwarsPart->show = $newState;
        $starwarsPart->save();

        return redirect(route('user.index'));
    }
}


