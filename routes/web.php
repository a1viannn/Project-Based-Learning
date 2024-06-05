<?php

use App\Http\Controllers\AlatController;
use App\Http\Controllers\anggotaController;
use App\Http\Controllers\BuatAkunController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SwitchRoleController;
use App\Http\Controllers\UkmController;
use App\Http\Middleware\CekRole;
use App\Models\Alat;
use App\Models\Pendaftaran;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', [UkmController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('home.main');
});


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/postlogin', [LoginController::class, 'postlogin'])->name('postlogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    // Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('can:view_dashboard');
    // Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('role:admin|pengurus');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');



Route::get('/divisi', [DivisiController::class, 'index'])->name('divisi')->middleware('role_or_permission:pengurus|anggota|manage_divisi');
Route::group(['middleware' => ['can:manage_divisi']], function () {
    // *** DIVISI *** //
    Route::get('/divisi/create', [DivisiController::class, 'create'])->name('create-divisi');
    Route::post('/divisi/simpan', [DivisiController::class, 'store'])->name('simpan-divisi');
    Route::get('/divisi/edit/{id}', [DivisiController::class, 'edit'])->name('edit-divisi');
    Route::post('/divisi/update/{id}', [DivisiController::class, 'update'])->name('update-divisi');
    Route::delete('/divisi/delete/{id}', [DivisiController::class, 'destroy'])->name('delete-divisi');
});


Route::group(['middleware' => ['can:manage_jadwal']], function () {
    // *** JADWAL *** //
    Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwal');
    Route::get('/jadwal/create', [JadwalController::class, 'create'])->name('create-jadwal');
    Route::post('/jadwal/simpan', [JadwalController::class, 'store'])->name('simpan-jadwal');
    Route::get('/jadwal/edit/{id}', [JadwalController::class, 'edit'])->name('edit-jadwal');
    Route::post('/jadwal/update/{id}', [JadwalController::class, 'update'])->name('update-jadwal');
    Route::delete('/jadwal/delete/{id}', [JadwalController::class, 'destroy'])->name('delete-jadwal');
});

Route::group(['middleware' => ['can:manage_pendaftar']], function () {
    //*** PENDAFTARAN *** //
    Route::get('/pendaftaran', [PendaftaranController::class, 'index'])->name('pendaftaran');
    Route::get('/pendaftaran/detail/{id}', [PendaftaranController::class, 'detail'])->name('detail-pendaftaran');
    // Route::get('/pendaftaran/edit/{id}', [PendaftaranController::class, 'edit'])->name('edit-pendaftaran');
    // Route::post('/pendaftaran/update/{id}', [PendaftaranController::class, 'update'])->name('update-pendaftaran');

    // UPDATE STATUS
    Route::post('/pendaftaran/diterima/{id}', [PendaftaranController::class, 'updateterima'])->name('terima-pendaftaran');
    Route::post('/pendaftaran/ditolak/{id}', [PendaftaranController::class, 'updatetolak'])->name('tolak-pendaftaran');
    // VIEW ANGGOTA
    Route::get('/pendaftaran/diterima', [PendaftaranController::class, 'terima'])->name('detail-terima');
    Route::get('/pendaftaran/ditolak', [PendaftaranController::class, 'tolak'])->name('detail-tolak');
});


Route::group(['middleware'=> ['can:transaksi']], function () {
    // *** ALAT *** //
    Route::get('/alat', [AlatController::class, 'index'])->name('alat');
    Route::get('/alat/create', [AlatController::class, 'create'])->name('create-alat');
    Route::post('/alat/simpan', [AlatController::class, 'store'])->name('simpan-alat');
    Route::get('/alat/edit/{id}', [AlatController::class, 'edit'])->name('edit-alat');
    Route::post('/alat/update/{id}', [AlatController::class, 'update'])->name('update-alat');
    Route::delete('/alat/delete/{id}', [AlatController::class, 'destroy'])->name('delete-alat');

    Route::get('/pinjam', [PeminjamanController::class, 'index'])->name('peminjaman');
    // Route::get('/pinjam/create', [PeminjamanController::class, 'create'])->name('create-pinjam');
    // Route::post('/pinjam/simpan', [PeminjamanController::class, 'store'])->name('simpan-pinjam');

    Route::get('/pengembalian', [PengembalianController::class, 'index'])->name('pengembalian');
    // Route::get('/pengembalian/create/{id}', [PengembalianController::class, 'create'])->name('create-kembali');
    // Route::post('/pengebalian/simpan', [PengembalianController::class, 'store'])->name('simpan-kembali');
    Route::delete('/pengembalian/delete/{id}', [PengembalianController::class, 'destroy'])->name('delete-pengembalian');
});


Route::group(['middleware'=> ['can:manage_pengurus']], function () {
    Route::get('/pengurus', [BuatAkunController::class, 'index'])->name('pengurus');
    Route::get('/pengurus/detail/{id}', [BuatAkunController::class, 'detail'])->name('detail-pengurus');
    Route::put('/pengurus/update/{id}', [BuatAkunController::class, 'update'])->name('update-pengurus');


});



    // *** PROFILE *** //
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('update-profile');
    Route::post('/profile/update', [ProfileController::class, 'updateGambar'])->name('gambar-profile');
    Route::post('/profile/delete', [ProfileController::class, 'deleteGambar'])->name('delete-profile');



// ...

    Route::middleware(['auth'])->group(function () {
        // ...
        Route::get('/switch-role/{role}', SwitchRoleController::class)->name('switch.role');
        // ...
    });

// ...













// // Route::group(['middleware' => ['auth','cekrole:administator,pembina']] , function(){
//     Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

//     // *** PENDAFTARAN *** //
//     Route::get('/pendaftaran', [PendaftaranController::class, 'index'])->name('pendaftaran');
//     Route::get('/pendaftaran/detail/{id}', [PendaftaranController::class, 'detail'])->name('detail-pendaftaran');
//     // Route::get('/pendaftaran/edit/{id}', [PendaftaranController::class, 'edit'])->name('edit-pendaftaran');
//     // Route::post('/pendaftaran/update/{id}', [PendaftaranController::class, 'update'])->name('update-pendaftaran');

//     // UPDATE STATUS
//     Route::post('/pendaftaran/diterima/{id}', [PendaftaranController::class, 'updateterima'])->name('terima-pendaftaran');
//     Route::post('/pendaftaran/ditolak/{id}', [PendaftaranController::class, 'updatetolak'])->name('tolak-pendaftaran');
//     // VIEW ANGGOTA
//     Route::get('/pendaftaran/diterima', [PendaftaranController::class, 'terima'])->name('detail-terima');
//     Route::get('/pendaftaran/ditolak', [PendaftaranController::class, 'tolak'])->name('detail-tolak');


//     // *** DIVISI *** //
//     Route::get('/divisi', [DivisiController::class, 'index'])->name('divisi');
//     Route::get('/divisi/create', [DivisiController::class, 'create'])->name('create-divisi');
//     Route::post('/divisi/simpan', [DivisiController::class, 'store'])->name('simpan-divisi');
//     Route::get('/divisi/edit/{id}', [DivisiController::class, 'edit'])->name('edit-divisi');
//     Route::post('/divisi/update/{id}', [DivisiController::class, 'update'])->name('update-divisi');
//     Route::delete('/divisi/delete/{id}', [DivisiController::class, 'destroy'])->name('delete-divisi');


//     // *** JADWAL *** //
//     Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwal');
//     Route::get('/jadwal/create', [JadwalController::class, 'create'])->name('create-jadwal');
//     Route::post('/jadwal/simpan', [JadwalController::class, 'store'])->name('simpan-jadwal');
//     Route::get('/jadwal/edit/{id}', [JadwalController::class, 'edit'])->name('edit-jadwal');
//     Route::post('/jadwal/update/{id}', [JadwalController::class, 'update'])->name('update-jadwal');
//     Route::delete('/jadwal/delete/{id}', [JadwalController::class, 'destroy'])->name('delete-jadwal');


//     // *** ALAT *** //
//     Route::get('/alat', [AlatController::class, 'index'])->name('alat');
//     Route::get('/alat/create', [AlatController::class, 'create'])->name('create-alat');
//     Route::post('/alat/simpan', [AlatController::class, 'store'])->name('simpan-alat');
//     Route::get('/alat/edit/{id}', [AlatController::class, 'edit'])->name('edit-alat');
//     Route::post('/alat/update/{id}', [AlatController::class, 'update'])->name('update-alat');
//     Route::delete('/alat/delete/{id}', [AlatController::class, 'destroy'])->name('delete-alat');

//     Route::get('/pinjam', [PeminjamanController::class, 'index'])->name('peminjaman');
//     // Route::get('/pinjam/create', [PeminjamanController::class, 'create'])->name('create-pinjam');
//     // Route::post('/pinjam/simpan', [PeminjamanController::class, 'store'])->name('simpan-pinjam');

//     Route::get('/pengembalian', [PengembalianController::class, 'index'])->name('pengembalian');
//     // Route::get('/pengembalian/create/{id}', [PengembalianController::class, 'create'])->name('create-kembali');
//     // Route::post('/pengebalian/simpan', [PengembalianController::class, 'store'])->name('simpan-kembali');
//     Route::delete('/pengembalian/delete/{id}', [PengembalianController::class, 'destroy'])->name('delete-pengembalian');


//     // *** PROFILE *** //
//     Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
//     Route::put('/profile', [ProfileController::class, 'update'])->name('update-profile');
//     Route::post('/profile/update', [ProfileController::class, 'updateGambar'])->name('gambar-profile');
//     Route::post('/profile/delete', [ProfileController::class, 'deleteGambar'])->name('delete-profile');
// // });







