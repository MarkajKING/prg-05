<?php

namespace App\Http\Controllers;

use App\Models\StarwarsPart;
use App\Models\Tag;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $headTitle = 'Searched Starwars Parts';

        $tags = Tag::all();

        $searchedItem = $request->input('part');

        $starwarsParts = StarwarsPart::latest()->where('title', 'like', '%' . $searchedItem . '%')
            ->orWhere('film', 'like', '%' . $searchedItem . '%')
            ->orWhere('description', 'like', '%' . $searchedItem . '%')
            ->orWhere('image', 'like', '%' . $searchedItem . '%')
            ->get();

        return view('index', compact('starwarsParts', 'headTitle', 'tags'));
    }

    public function show($name)
    {
        $headTitle = 'Filtered Starwars Parts';
        $tags = Tag::all();

        if ($name == 'Hope')
        {
            $starwarsParts = StarwarsPart::whereHas('tags', function($q){
                $q->where('name', '=', 'hope' );
            })->get();
        } elseif ($name =='Darth')
        {
            $starwarsParts = StarwarsPart::whereHas('tags', function($q){
                $q->where('name', '=', 'darth' );
            })->get();
        } elseif($name == 'Light')
        {
            $starwarsParts = StarwarsPart::whereHas('tags', function($q){
                $q->where('name', '=', 'light' );
            })->get();
        }


        return view('index',
            compact('headTitle', 'starwarsParts', 'tags'));
    }
}
