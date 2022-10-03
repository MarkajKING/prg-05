<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class CrudController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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
            return redirect('index');
        }
    }

    public function delete($id)
    {
        $delete = DB::table('starwars_parts')
            ->where('id', $id)
            ->delete();
        return redirect('index');
    }

    public function edit($id)
    {
        $row = DB::table('starwars_parts')
            ->where('id', $id)
            ->first();
        $data = [
            'info'=>$row
        ];

        return view('editpart', $data);
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'film' => 'required',
            'description' => 'required',
            'image' => 'nullable'
        ]);

        $updating = DB::table('starwars_parts')
            ->where('id', $request->input('cid'))
            ->update([
                'title' => $request->input('title'),
                'film'=>$request->input('film'),
                'description'=>$request->input('description'),
                'image'=>$request->input('image')
            ]);

        return redirect('index');
    }
}
