<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ListMobilController;
use App\Http\Controllers\PemesananAdminController;
use App\Http\Controllers\LandingpageController;
use App\Http\Controllers\LandingpagebfController;


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

// route list_mobil 
Route::get('/listmobil', [ListMobilController::class, 'show'])->name('mobil.list');
Route::get('/listmobil/{kode_mobil}', [ListMobilController::class, 'detail'])->name('mobil.detail');
Route::post('/listmobil/simpan', [ListMobilController::class, 'simpan'])->name('mobil.simpan');
Route::delete('/listmobil/{kode_mobil}', [ListMobilController::class, 'delete'])->name('mobil.delete');
Route::put('/listmobil/{kode_mobil}', [ListMobilController::class, 'update'])->name('mobil.update');


// Halaman Utama
Route::get('/landingpage', [LandingpageController::class, 'index'])->name('landingpage');
Route::post('/pemesanan/tambah', [LandingpageController::class, 'tambah'])->name('pemesanan.tambah');
Route::get('/landingpagebf', [LandingpagebfController::class, 'index'])->name('landingpagebf');

// Kontak
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// Riwayat
Route::get('/riwayat', [RiwayatController::class, 'index'])->name('riwayat');

// Logout
Route::post('/logout', [ProfileController::class, 'logout'])->name('logout');

// REGISTRASI
Route::get('/registerpage', [AuthController::class, 'showRegister'])->name('registerpage');
Route::post('/registerpage', [AuthController::class, 'register'])->name('registerpage.post');

// LOGIN
Route::get('/loginpage', [AuthController::class, 'showLogin'])->name('loginpage');
Route::post('/loginpage', [AuthController::class, 'login'])->name('loginpage.post');

// RESET PASSWORD
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

// EDIT PROFIL
Route::get('/edit-profile', [EditProfileController::class, 'show'])->name('edit-profile');
Route::post('/edit-profile', [EditProfileController::class, 'update'])->name('edit-profile.update');