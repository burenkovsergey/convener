<?php

use App\Http\Controllers\BoardGamesController;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home.index');

Route::get('laravel-doc', function () {
    return view('welcome');
})->name('laravel-doc');

Route::resource('boardgames', BoardGamesController::class);

Auth::routes();
