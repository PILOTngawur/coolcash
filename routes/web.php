<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('landing'); // nanti bikin file landing.blade.php
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
