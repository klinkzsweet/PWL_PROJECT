<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataCustomerController;
use App\Http\Controllers\DataSparepartController;
use App\Http\Controllers\DataServiceController;
use App\Http\Controllers\DataPembelianController;
use App\Http\Controllers\DataTransaksiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [DashboardController::class,'index'])->middleware('auth');
Route::resource('/datacustomer', DataCustomerController::class)->middleware('auth');
Route::resource('/datapegawai', UserController::class)->middleware('auth');
Route::resource('/datasparepart', DataSparepartController::class)->middleware('auth');
Route::resource('/service', DataServiceController::class)->middleware('auth');
Route::resource('/pembelian', DataPembelianController::class)->middleware('auth');
Route::resource('/transaksi', DataTransaksiController::class)->middleware('auth');
Route::get('/laporan', [LaporanController::class,'index'])->middleware('auth');
Route::post('/laporan/cetak', [LaporanController::class,'cetak'])->middleware('auth');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
