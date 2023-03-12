<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FiturController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [LandingPageController::class,'index']);
Route::get('/semua_buku', [LandingPageController::class,'buku_index']);
Route::get('/semua_buku/cari', [LandingPageController::class,'cari_buku']);
Route::get('/daftar', [AuthController::class,'tampil_register_pengguna']);
Route::post('/daftar/proses', [AuthController::class,'register_pengguna']);
Route::get('/masuk', [AuthController::class,'tampil_login_pengguna'])->name('login');;
Route::post('/masuk/proses', [AuthController::class,'login_pengguna']);
Route::get('/login_admin', [AuthController::class, 'tampil_login']);
Route::post('/login_admin_proses', [AuthController::class, 'login']);

Route::group(['middleware'=>['auth', 'ceklevel:admin']], function() {
    Route::get('/logout_admin', [AuthController::class, 'logout']);
    Route::get('/register_admin', [AuthController::class, 'tampil_register']);
    Route::get('/buku', [BukuController::class, 'index']);
    Route::get('/buku/tambah', [BukuController::class, 'create']);
    Route::post('/buku/simpan', [BukuController::class, 'store']);
    Route::get('/buku/edit/{id}', [BukuController::class, 'edit']);
    Route::post('/buku/perbarui/{id}', [BukuController::class, 'update']);
    Route::get('/buku/hapus/{id}', [BukuController::class, 'destroy']);
    Route::get('/peminjaman', [TransaksiController::class, 'index']);
    Route::get('/peminjaman/tambah', [TransaksiController::class, 'create']);
    Route::post('/peminjaman/simpan', [TransaksiController::class, 'store']);
    Route::get('/peminjaman/edit/{id}', [TransaksiController::class, 'edit']);
    Route::post('/peminjaman/perbarui/{id}', [TransaksiController::class, 'update']);
    Route::get('/peminjaman/hapus/{id}', [TransaksiController::class, 'destroy']);
    Route::get('/anggota', [AnggotaController::class, 'index']);
    Route::get('/anggota/tambah', [AnggotaController::class, 'create']);
    Route::post('/anggota/simpan', [AnggotaController::class, 'store']);
    Route::get('/anggota/edit/{id}', [AnggotaController::class, 'edit']);
    Route::post('/anggota/perbarui/{id}', [AnggotaController::class, 'update']);
    Route::get('/anggota/hapus/{id}', [AnggotaController::class, 'destroy']);
    Route::get('/anggota/reset_katasandi/{id}', [AnggotaController::class, 'tampilan_update_passsword']);
    Route::post('/anggota/perbarui_katasandi/{id}', [AnggotaController::class, 'update_password']);
    Route::get('/galeri', [GaleriController::class, 'index']);
    Route::get('/galeri/tambah', [GaleriController::class, 'create']);
    Route::post('/galeri/simpan', [GaleriController::class, 'store']);
    Route::get('/galeri/edit/{id}', [GaleriController::class, 'edit']);
    Route::post('/galeri/perbarui/{id}', [GaleriController::class, 'update']);
    Route::get('/galeri/hapus/{id}', [GaleriController::class, 'destroy']);
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/sampul/tambah', [DashboardController::class, 'create']);
    Route::post('/sampul/simpan', [DashboardController::class, 'store']);
    Route::get('/sampul/edit/{id}', [DashboardController::class, 'edit']);
    Route::post('/sampul/perbarui/{id}', [DashboardController::class, 'update']);
    Route::get('/sampul/hapus/{id}', [DashboardController::class, 'destroy']);
    Route::get('/fitur/tambah', [FiturController::class, 'create']);
    Route::post('/fitur/simpan', [FiturController::class, 'store']);
    Route::get('/fitur/edit/{id}', [FiturController::class, 'edit']);
    Route::post('/fitur/perbarui/{id}', [FiturController::class, 'update']);
    Route::get('/fitur/hapus/{id}', [FiturController::class, 'destroy']);
});

Route::get('/penulis/{nama}', [LandingPageController::class, 'cari_penulis']);
Route::group(['middleware'=>['auth', 'ceklevel:user']], function() {
    Route::get('/keluar', [AuthController::class, 'logout_pengguna']);
    Route::get('/pinjam/tambah/{id}', [LandingPageController::class, 'show']);
    Route::post('/pinjam/simpan', [TransaksiController::class, 'store_pengguna']);
    Route::get('/data_pinjam/{id}', [LandingPageController::class, 'show_pinjam']);
    Route::get('/kembalikan/{id}', [LandingPageController::class, 'kembalikan_pinjaman']);
});
