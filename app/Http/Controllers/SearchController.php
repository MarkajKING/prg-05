<?php

namespace App\Http\Controllers;

use App\Models\StarwarsPart;
use App\Models\Tag;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $errorMessage = '';
        $headTitle = 'Searched Starwars Parts';

        $tags = Tag::all();

        $searchedItem = $request->input('part');

        $starwarsParts = StarwarsPart::where('show', '=', '1')
            ->where('title', 'like', '%' . $searchedItem . '%')
            ->where('film', 'like', '%' . $searchedItem . '%')
            ->where('description', 'like', '%' . $searchedItem . '%')
            ->where('image', 'like', '%' . $searchedItem . '%')
            ->get();

        return view('index', compact('starwarsParts', 'headTitle', 'tags', 'errorMessage'));
    }

    public function show($name)
    {
        $headTitle = 'Filtered Starwars Parts';
        $tags = Tag::all();
        $errorMessage = '';


        $starwarsParts = StarwarsPart::whereHas('tags', function ($q) use ($name) {
            $q->where('name', '=', $name)
                ->where('show', '=', '1');
        })->get();



        return view('index',
            compact('headTitle', 'starwarsParts', 'tags', 'errorMessage'));
    }
}
