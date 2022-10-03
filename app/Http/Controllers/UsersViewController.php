<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersViewController extends Controller
{
    public function index()
    {
        $headTitle = 'User View';

       // $users = User::all();

        return view('usersView',
        compact(//'users',
        'headTitle'));
    }
}
