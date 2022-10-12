<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\StarwarsPartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UsersViewController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [StarwarsPartController::class, 'index']);

Route::get('/home', [StarwarsPartController::class, 'index']);

Route::get('/about', [AboutController::class, 'show']);

Route::resource('starwars-part', StarwarsPartController::class);

//Route::get('/usersView', [UsersViewController::class, 'index']);
