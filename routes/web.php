<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Transaksi;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/transaksi', [Transaksi::class, 'index'])->name('transaksi');

Route::get('/transaksi2022', [Transaksi::class, 'transaksi2022'])->name('transaksi2022');

Route::get('/transaksi2021', [Transaksi::class, 'transaksi2021'])->name('transaksi2021');
