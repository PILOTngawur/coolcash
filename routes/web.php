<?php

use App\Http\Controllers\CategoriesDebitController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DebitController;

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
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


Route::get('/categories_debit', [CategoriesDebitController::class, 'index'])->name('categories_debit');

