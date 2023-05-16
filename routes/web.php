<?php

use App\Http\Controllers\LaporanController;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Kalau routenya itu terdiri dari CRUD, tinggal pakai Route::resource() aja Tegar, lebih simple and elegant
// Dashboard
Route::group(["prefix" => "dashboard", "middleware" => ["auth"], "as" => "dashboard."], function(){
    Route::view('/', "index")->name("admin");
    Route::resource("kontrakan", "KontrakanController");
    Route::resource("penghuni", "PenghuniController");
    Route::resource("transaksi", "TransaksiController");
    Route::resource("laporan", "LaporanController");
    Route::get("print", [LaporanController::class, "cetak"])->name('print');
    Route::get("halamanPrint/{tglawal}/{tglakhir}", [LaporanController::class, "cetakLaporanPertanggal"])->name("halamanPrint");
    Route::resource("log", "LogController");
    // Route::get("showTransaksi", "LogController@showLogTransaksi")->name('showTransaksi');
});
