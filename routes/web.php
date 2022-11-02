<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ProfileController;

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

Route::get('/', function () {
    return view('Layout');
});


Route::get('/kontak',[KontakController::class,'index']);
Route::get('kontak/hapus/{id}',[KontakController::class,'hapus']);
Route::post('kontak/update/{id}', [KontakController::class, 'update'])->name('kontak.update');
Route::post('kontak/tambah',[KontakController::class,'tambah']);

Route::get('/profile',[ProfileController::class,'index']);
Route::get('profile/hapus/{id}',[ProfileController::class,'hapus']);
Route::post('profile/tambah',[ProfileController::class,'tambah']);
Route::post('profile/update/{id}',[ProfileController::class,'update'])->name('profile.update');


Route::get('/berita',[BeritaController::class,'index']);
Route::get('berita/hapus/{id}',[BeritaController::class,'hapus']);
Route::post('berita/update/{id}', [BeritaController::class, 'update'])->name('berita.update');
Route::post('berita/tambah',[BeritaController::class,'tambah']);

