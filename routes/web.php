<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\StarwarsPartController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [StarwarsPartController::class, 'index']);

Route::get('/home', [StarwarsPartController::class, 'index']);

Route::get('/about', [AboutController::class, 'show']);

Route::resource('starwars-part', StarwarsPartController::class);
Route::patch('starwars-part/{starwars_part}/enable', [StarwarsPartController::class, 'enable'])->name('starwars-part.enable');

Route::resource('user', UserController::class);
Route::get('user/{user}/admin', [UserController::class, 'admin'])->name('user.admin');
Route::patch('user/{user}/editAdmin', [UserController::class, 'editAdmin'])->name('user.editAdmin');

Route::resource('search', SearchController::class);

//Route::get('/usersView', [UsersViewController::class, 'index']);
