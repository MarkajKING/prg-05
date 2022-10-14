<?php

namespace App\Http\Controllers;

use App\Models\StarwarsPart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $parts = Auth::user()->starwars_parts;
        return view('userPart', compact('parts'));
    }

    public function show($id)
    {
        $user = Auth::user();
        return view('userDetails', compact('user'));
    }

    public function edit($id)
    {
        $headTitle = 'Edit your Account';
        $user = User::find($id);

        return view('editUser',
            compact('user',
                'headTitle'));
    }

    public
    function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',

        ]);

        $user = User::find($id);
        $user->update($request->all());

        return redirect(route('user.show', $user->id));
    }
}
