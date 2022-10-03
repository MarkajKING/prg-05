<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UsersViewController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index']);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/index', [IndexController::class, 'show']);

Route::get('/about', [AboutController::class, 'show']);

Route::get('/makepart', [CrudController::class, 'show']);
Route::post('add', [CrudController::class, 'add']);
Route::get('edit/{id}', [CrudController::class, 'edit']);
Route::post('update', [CrudController::class, 'update'])->name('update');
Route::get('delete/{id}', [CrudController::class, 'delete']);

Auth::routes();

Route::get('/usersView', [UsersViewController::class, 'index']);
