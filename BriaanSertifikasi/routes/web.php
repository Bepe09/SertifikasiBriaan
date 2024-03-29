<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\KoleksiController;
use App\Http\Controllers\PeminjamanController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/anggota', [AnggotaController::class, 'index'])->name('anggota.index');
Route::get('/anggota/pendaftaran', [AnggotaController::class, 'create'])->name('anggota.create');
Route::post('/anggota', [AnggotaController::class, 'store'])->name('anggota.store');
Route::get('/anggota/{anggota}/edit', [AnggotaController::class, 'edit'])->name('anggota.edit');
Route::put('/anggota/{anggota}/update', [AnggotaController::class, 'update'])->name('anggota.update');
Route::delete('/anggota/{anggota}/delete', [AnggotaController::class, 'destroy'])->name('anggota.destroy');

Route::get('/koleksi', [KoleksiController::class, 'index'])->name('koleksi.index');
Route::get('/koleksi/menambahkan', [KoleksiController::class, 'create'])->name('koleksi.create');
Route::post('/koleksi', [KoleksiController::class, 'store'])->name('koleksi.store');
Route::get('/koleksi/{koleksi}/edit', [KoleksiController::class, 'edit'])->name('koleksi.edit');
Route::put('/koleksi/{koleksi}/update', [KoleksiController::class, 'update'])->name('koleksi.update');
Route::delete('/koleksi/{koleksi}/delete', [KoleksiController::class, 'destroy'])->name('koleksi.destroy');

Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index');
Route::get('/peminjaman/pinjam', [PeminjamanController::class, 'create'])->name('peminjaman.create');
Route::post('/peminjaman', [PeminjamanController::class, 'store'])->name('peminjaman.store');
Route::get('/peminjaman/{peminjaman}/edit', [PeminjamanController::class, 'edit'])->name('peminjaman.edit');
Route::put('/peminjaman/{peminjaman}/update', [PeminjamanController::class, 'update'])->name('peminjaman.update');

Route::get('/katalog', [KoleksiController::class, 'katalogindex'])->name('katalog.index');



