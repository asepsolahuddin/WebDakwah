<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\PegawaiControler;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SuperadminControler;




Route::get('/', [HomeController::class, 'index']);
Route::get('/halaman-video',[HomeController::class, 'video']);
Route::get('/detail-video/{id}',[HomeController::class, 'detail_video'])->name('detail.video');
Route::get('/search-video',[HomeController::class, 'search_video'])->name('search.video');
Route::get('/welcome/{id}', [HomeController::class, 'detail_artikel'])->name('welcome.artikel');
Route::get('/halaman-artikel',[HomeController::class, 'artikel'])->name('post.artikel');

Route::get('register', [RegisterController::class,'halamanRegister'])->name('register');
Route::post('register', [RegisterController::class, 'register']);
Route::post('register_ustad', [RegisterController::class, 'register_ustad'])->name('registustad');


Route::group(['middleware' => 'guest'], function() {
    Route::get('/loginadmin', [AuthController::class, 'login'])->name('login');
    Route::post('/loginadmin', [AuthController::class, 'dologin']);

});

// untuk superadmin dan pegawai
Route::group(['middleware' => ['auth', 'checkrole:1,2']], function() {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/redirect', [RedirectController::class, 'cek']);
});

Route::group(['middleware' => ['auth', 'checkrole:1']], function() {
    Route::get('/dbadmin', [SuperadminControler::class, 'index']);
});

Route::group(['middleware' => ['auth', 'checkrole:2']], function() {
    Route::get('/dashboard', [PegawaiControler::class, 'index']);
});

//database admin video crud
Route::resource('dbvideos', VideoController::class);
Route::resource('dbartikels', ArtikelController::class);
