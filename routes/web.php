<?php

use App\Http\Controllers\CategoriesDebitController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PasswordController;
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

//Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');});
Route::get('/password/edit', [PasswordController::class, 'edit'])->name('password.edit');
Route::post('/password/update', [PasswordController::class, 'update'])->name('password.update');


Route::resource('account/categories_debit', CategoriesDebitController::class);
Route::resource('account/debit', DebitController::class);


