<?php

use App\Http\Controllers\CategoriesDebitController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\DebitController;
use App\Http\Controllers\CategoriesCreditController;
use App\Http\Controllers\CreditController;
use App\Http\Controllers\LaporanCreditController;
use App\Http\Controllers\LaporanDebitController;

Route::get('/', function () {
    return view('landing'); 
});

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/'); // arahkan balik ke halaman login
})->name('logout');

Auth::routes();
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


Route::resource('account/profile', ProfileController::class);
Route::get('/password/edit', [PasswordController::class, 'edit'])->name('password.edit');
Route::post('/password/update', [PasswordController::class, 'update'])->name('password.update');

// Kategori & transaksi Uang Keluar
Route::resource('account/categories_debit', CategoriesDebitController::class);
Route::get('/categories_debit/search', [App\Http\Controllers\CategoriesDebitController::class, 'search'])->name('categories_debit.search');
Route::resource('account/debit', DebitController::class);
Route::get('/debit/search', [App\Http\Controllers\DebitController::class, 'search'])->name('debit.search');


// Kategori & transaksi Uang Masuk
Route::resource('account/categories_credit', CategoriesCreditController::class);
Route::resource('account/credit', CreditController::class);


Route::resource('account/laporan_credit', LaporanCreditController::class);
Route::get('laporan_credit/check', [LaporanCreditController::class, 'check'])->name('laporan-credit.check');
Route::get('/laporan_credit/export', [LaporanCreditController::class, 'export'])->name('laporan.credit.export');


Route::resource('account/laporan_debit', LaporanDebitController::class);
Route::get('laporan_debit/check', [LaporanDebitController::class, 'check'])->name('laporan-debit.check');
Route::get('/laporan_debit/export', [LaporanDebitController::class, 'export'])->name('laporan.debit.export');


