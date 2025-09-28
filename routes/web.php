<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;


Route::get('/', function () {
    return view('landing'); // nanti bikin file landing.blade.php
});

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/'); // arahkan balik ke halaman login
})->name('logout');

Auth::routes();

//Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
//Route::get('/home', [HomeController::class, 'index'])->name('home');
