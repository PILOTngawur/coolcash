<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\CategoriesDebitController;
use App\Http\Controllers\DebitController;
use App\Http\Controllers\CategoriesCreditController;
use App\Http\Controllers\CreditController;

// Landing page
Route::get('/', function () {
    return view('landing'); 
});

// Logout
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/'); // arahkan balik ke halaman login
})->name('logout');

// Auth routes (login, register, dll)
Auth::routes();

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Profile (manual, bukan resource)
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

// Password
Route::get('/password/edit', [PasswordController::class, 'edit'])->name('password.edit');
Route::post('/password/update', [PasswordController::class, 'update'])->name('password.update');

// Kategori & transaksi Uang Keluar
Route::resource('account/categories_debit', CategoriesDebitController::class);
Route::resource('account/debit', DebitController::class);
Route::get('/debit/search', [DebitController::class, 'search'])->name('debit.search');

// Kategori & transaksi Uang Masuk
Route::resource('account/categories_credit', CategoriesCreditController::class);
Route::resource('account/credit', CreditController::class);
