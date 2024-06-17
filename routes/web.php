<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PegawaiControler;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\SuperadminControler;



Route::get('/', function () {
    return view('welcome');
});

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
