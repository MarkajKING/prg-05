<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class CrudController extends Controller
{
    public function show()
    {
        return view('makepart');
    }

    public function add(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'film' => 'required',
            'description' => 'required',
            'image' => 'nullable'
        ]);

        $query = DB::table('starwars_parts')->insert([
            'title' => $request->input('title'),
            'film'=>$request->input('film'),
            'description'=>$request->input('description'),
            'image'=>$request->input('image')

        ]);

        if ($query){
            return redirect()->action([IndexController::class, 'show']);
        }
    }
}
