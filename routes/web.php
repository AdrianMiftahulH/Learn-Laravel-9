<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\HalamanController;

// Route::get('/', function () {
//     return view('welcome');
// });

// === Learn use Route ===

// Route::get('/siswa', function () {
//     return "<h1>Saya siswa</h1>";
// });

// // with parameter
// Route::get('/siswa/{id}', function ($id) {
//     return "<h1>Saya siswa $id</h1>";
// })->where('id', '[0-9]+');

// Route::get('/siswa/{id}/{nama}', function ($id, $nama) {
//     return "<h1>Saya siswa $id. nama $nama</h1>";
// })->where(['id' => '[0-9]+', 'nama' => '[A-Za-z]+']);

// === Learn Controller ===

// Route::get('siswa', [SiswaController::class, 'index']);
// Route::get('siswa/{id}', [SiswaController::class, 'detail'])->where('id', '[0-9]+');

Route::resource('siswa', SiswaController::class);

// === Learn Blade Template ===

Route::get('/', [HalamanController::class, 'index']);
Route::get('/tentang', [HalamanController::class, 'tentang']);
Route::get('/kontak', [HalamanController::class, 'kontak']);
