<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ListMobilController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/list', [ProductController::class, 'show']);

Route::get('/home', [HomeController::class, 'index']);

Route::get('/admin', [AdminController::class, 'index'])->name('admin');

Route::get('/pemesananadmin', [AdminController::class, 'pemesananAdmin'])->name('pemesananadmin');

Route::get('/mobiladmin', [AdminController::class, 'mobiladmin'])->name('mobiladmin');

Route::get('/ulasanadmin', [AdminController::class, 'ulasanadmin'])->name('ulasanadmin');

Route::get('/hubungiadmin', [AdminController::class, 'hubungiadmin'])->name('hubungiadmin');

Route::get('/listmobil', [ListMobilController::class, 'show']);
