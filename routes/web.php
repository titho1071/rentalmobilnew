<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ListMobilController;
use App\Http\Controllers\PemesananAdminController;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/list', [ProductController::class, 'show']);

Route::get('/home', [HomeController::class, 'index']);

Route::get('/admin', [AdminController::class, 'index'])->name('admin');

Route::get('/mobiladmin', [AdminController::class, 'mobiladmin'])->name('mobiladmin');

Route::get('/ulasanadmin', [AdminController::class, 'ulasanadmin'])->name('ulasanadmin');

Route::get('/hubungiadmin', [AdminController::class, 'hubungiadmin'])->name('hubungiadmin');

//route pemesanan admin
Route::get('/pemesananadmin', [PemesananAdminController::class, 'index'])->name('pemesanan_admin');
Route::put('/pemesanan/update/{pemesanan}', [PemesananAdminController::class, 'update'])->name('pemesanan.update');

// route mobil admin
Route::get('/listmobil', [ListMobilController::class, 'show'])->name('mobil.list');
Route::post('/listmobil/simpan', [ListMobilController::class, 'simpan'])->name('mobil.simpan');


