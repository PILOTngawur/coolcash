<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DebitController;
use App\Http\Controllers\CategoriesDebitController;


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

Route::get('/debits', [DebitController::class, 'index'])->name('debits.index');
Route::post('/debits', [DebitController::class, 'store'])->name('debits.store');
Route::put('/debits/{id}', [DebitController::class, 'update'])->name('debits.update');
Route::delete('/debits/{id}', [DebitController::class, 'destroy'])->name('debits.destroy');

Route::get('/categories-debit', [CategoriesDebitController::class, 'index'])->name('categories-debit.index');
Route::post('/categories-debit', [CategoriesDebitController::class, 'store'])->name('categories-debit.store');
Route::put('/categories-debit/{id}', [CategoriesDebitController::class, 'update'])->name('categories-debit.update');
Route::delete('/categories-debit/{id}', [CategoriesDebitController::class, 'destroy'])->name('categories-debit.destroy');