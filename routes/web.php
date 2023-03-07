<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RfidController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\TasemeterController;
use App\Http\Controllers\Absencontroller;


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

 Route::get('/rfid/{id}',[RfidController::class, 'rfid'])->name('rfid');
Route::group(['middleware' => ['guest']], function () {
    Route::get('/login',[AuthController::class, 'login'])->name('login');
    Route::get('/registrasi',[AuthController::class, 'registrasi'])->name('registrasi');
    Route::post('/post',[AuthController::class, 'post'])->name('login.post');
    Route::post('/store',[AuthController::class, 'store'])->name('registrasi.store');
   
});

Route::get('/logout',[AuthController::class, 'logout'])->name('logout');
Route::get('/barang_test',[BarangController::class, 'index_test'])->name('barang_test');

// admin
Route::group(['middleware' => ['auth', 'checkRole:Admin']], function () {
    Route::get('/', [TasemeterController::class, 'index'])->name('tasemeter');

    // tasemeter
    Route::get('/tasemeter',[TasemeterController::class, 'index'])->name('tasemeter');
    Route::get('/tasemeter/create',[TasemeterController::class, 'create'])->name('tasemeter.create');
    Route::post('/tasemeter/store',[TasemeterController::class, 'store'])->name('tasemeter.store');
    Route::get('/tasemeter/edit/{id}',[TasemeterController::class, 'edit'])->name('tasemeter.edit');
    Route::post('/tasemeter/update/{id}',[TasemeterController::class, 'update'])->name('tasemeter.update');
    Route::get('/tasemeter/delete/{id}',[TasemeterController::class, 'delete'])->name('tasemeter.delete');
    Route::get('/absen/{id}',[TasemeterController::class, 'show'])->name('tasemeter.show');





    // rfid

   
      // jadwal
      Route::get('/jadwal',[JadwalController::class, 'index'])->name('jadwal');
      Route::get('/jadwal/create/{id}',[JadwalController::class, 'create'])->name('jadwal.create');
      Route::post('/jadwal/store',[JadwalController::class, 'store'])->name('jadwal.store');
      Route::get('/jadwal/edit/{id}',[JadwalController::class, 'edit'])->name('jadwal.edit');
      Route::post('/jadwal/update/{id}',[JadwalController::class, 'update'])->name('jadwal.update');
      Route::get('/jadwal/delete/{id}',[JadwalController::class, 'delete'])->name('jadwal.delete');

    // barang
    Route::get('/barang',[BarangController::class, 'index'])->name('barang');
    Route::get('/barang/create',[BarangController::class, 'create'])->name('barang.create');
    Route::post('/barang/store',[BarangController::class, 'store'])->name('barang.store');
    Route::get('/barang/edit/{id}',[BarangController::class, 'edit'])->name('barang.edit');
    Route::post('/barang/update/{id}',[BarangController::class, 'update'])->name('barang.update');
    Route::get('/barang/delete/{id}',[BarangController::class, 'delete'])->name('barang.delete');

    //view
    Route::get('/view_barang',[BarangController::class, 'view_barang'])->name('view_barang');

    //transaksi
    Route::get('/transaksi',[TransaksiController::class, 'index'])->name('transaksi');
    Route::get('/buy/{id}',[TransaksiController::class, 'buy'])->name('buy.barang');

    //pengguna
    Route::get('/pengguna/edit/{id}', [PenggunaController::class, 'edit'])->name('pengguna.edit');
    Route::get('/pengguna/index', [PenggunaController::class, 'index'])->name('pengguna.index');
    Route::post('/pengguna/update/{id}', [PenggunaController::class, 'update'])->name('pengguna.update');
    Route::post('/pengguna/store/', [PenggunaController::class, 'store'])->name('pengguna.store');
    Route::get('/pengguna/create/', [PenggunaController::class, 'create'])->name('pengguna.create');
    Route::get('/pengguna/delete/{id}', [PenggunaController::class, 'delete'])->name('pengguna.delete');

});


//ROlE USER
Route::group(['middleware' => ['auth', 'checkRole:Admin,User']], function () {
    Route::get('/',[AbsenController::class, 'index'])->name('absen');

    
    // absen saya
    Route::get('/absensaya',[AbsenController::class, 'index'])->name('absen');
    Route::get('/lihatabsen/{id}',[AbsenController::class, 'show'])->name('lihatabsen');
    
     
     Route::get('/email', function () {
    return redirect()->to('https://srv68.niagahoster.com:2096/cpsess8043441359/')->send();
})->name('email');
});


