<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PendampingController;
use App\Http\Controllers\BantuanController;
use App\Http\Controllers\CalonPenerimaController;
use App\Http\Controllers\PenerimaController;
use App\Http\Controllers\JadwalPenyaluranController;
use App\Http\Controllers\PenyaluranBantuanController;
use App\Http\Controllers\SerahTerimaController;
use App\Http\Controllers\MonitoringController;
use App\Http\Controllers\LaporanController;

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/user/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');

    // Admin Pendamping CRUD Routes
    Route::prefix('admin/pendamping')->name('admin.pendamping.')->group(function () {
        Route::get('/', [PendampingController::class, 'index'])->name('index');
        Route::get('/create', [PendampingController::class, 'create'])->name('create');
        Route::post('/', [PendampingController::class, 'store'])->name('store');
        Route::get('/{pendamping}/edit', [PendampingController::class, 'edit'])->name('edit');
        Route::put('/{pendamping}', [PendampingController::class, 'update'])->name('update');
        Route::delete('/{pendamping}', [PendampingController::class, 'destroy'])->name('destroy');
        Route::post('/{pendamping}/create-account', [PendampingController::class, 'createAccount'])->name('create-account');
        Route::post('/{pendamping}/reset-password', [PendampingController::class, 'resetPassword'])->name('reset-password');
    });

    // Admin Bantuan CRUD Routes
    Route::prefix('admin/bantuan')->name('admin.bantuan.')->group(function () {
        Route::get('/', [BantuanController::class, 'index'])->name('index');
        Route::get('/create', [BantuanController::class, 'create'])->name('create');
        Route::post('/', [BantuanController::class, 'store'])->name('store');
        Route::get('/{bantuan}/edit', [BantuanController::class, 'edit'])->name('edit');
        Route::put('/{bantuan}', [BantuanController::class, 'update'])->name('update');
        Route::delete('/{bantuan}', [BantuanController::class, 'destroy'])->name('destroy');
    });

    // Admin Calon Penerima CRUD Routes
    Route::prefix('admin/calonpenerima')->name('admin.calonpenerima.')->group(function () {
        Route::get('/', [CalonPenerimaController::class, 'index'])->name('index');
        Route::get('/create', [CalonPenerimaController::class, 'create'])->name('create');
        Route::post('/', [CalonPenerimaController::class, 'store'])->name('store');
        Route::get('/{calonpenerima}/edit', [CalonPenerimaController::class, 'edit'])->name('edit');
        Route::put('/{calonpenerima}', [CalonPenerimaController::class, 'update'])->name('update');
        Route::delete('/{calonpenerima}', [CalonPenerimaController::class, 'destroy'])->name('destroy');
    });

    // Admin Penerima CRUD Routes
    Route::prefix('admin/penerima')->name('admin.penerima.')->group(function () {
        Route::get('/', [PenerimaController::class, 'index'])->name('index');
        Route::get('/create', [PenerimaController::class, 'create'])->name('create');
        Route::post('/', [PenerimaController::class, 'store'])->name('store');
        Route::get('/{penerima}', [PenerimaController::class, 'show'])->name('show');
        Route::get('/{penerima}/edit', [PenerimaController::class, 'edit'])->name('edit');
        Route::put('/{penerima}', [PenerimaController::class, 'update'])->name('update');
        Route::delete('/{penerima}', [PenerimaController::class, 'destroy'])->name('destroy');
    });

    // Admin Jadwal Penyaluran CRUD Routes
    Route::prefix('admin/jadwalpenyaluran')->name('admin.jadwalpenyaluran.')->group(function () {
        Route::get('/', [JadwalPenyaluranController::class, 'index'])->name('index');
        Route::get('/create', [JadwalPenyaluranController::class, 'create'])->name('create');
        Route::post('/', [JadwalPenyaluranController::class, 'store'])->name('store');
        Route::get('/{jadwalpenyaluran}/edit', [JadwalPenyaluranController::class, 'edit'])->name('edit');
        Route::put('/{jadwalpenyaluran}', [JadwalPenyaluranController::class, 'update'])->name('update');
        Route::delete('/{jadwalpenyaluran}', [JadwalPenyaluranController::class, 'destroy'])->name('destroy');
    });

    // Admin Penyaluran Bantuan CRUD Routes
    Route::prefix('admin/penyaluranbantuan')->name('admin.penyaluranbantuan.')->group(function () {
        Route::get('/', [PenyaluranBantuanController::class, 'index'])->name('index');
        Route::get('/create', [PenyaluranBantuanController::class, 'create'])->name('create');
        Route::post('/', [PenyaluranBantuanController::class, 'store'])->name('store');
        Route::get('/{penyaluranbantuan}/edit', [PenyaluranBantuanController::class, 'edit'])->name('edit');
        Route::put('/{penyaluranbantuan}', [PenyaluranBantuanController::class, 'update'])->name('update');
        Route::delete('/{penyaluranbantuan}', [PenyaluranBantuanController::class, 'destroy'])->name('destroy');
    });

    // Admin Serah Terima CRUD Routes
    Route::prefix('admin/serahterima')->name('admin.serahterima.')->group(function () {
        Route::get('/', [SerahTerimaController::class, 'index'])->name('index');
        Route::get('/create', [SerahTerimaController::class, 'create'])->name('create');
        Route::post('/', [SerahTerimaController::class, 'store'])->name('store');
        Route::get('/{serahterima}/edit', [SerahTerimaController::class, 'edit'])->name('edit');
        Route::put('/{serahterima}', [SerahTerimaController::class, 'update'])->name('update');
        Route::delete('/{serahterima}', [SerahTerimaController::class, 'destroy'])->name('destroy');
    });

    // Admin Monitoring CRUD Routes
    Route::prefix('admin/monitoring')->name('admin.monitoring.')->group(function () {
        Route::get('/', [MonitoringController::class, 'index'])->name('index');
        Route::get('/create', [MonitoringController::class, 'create'])->name('create');
        Route::post('/', [MonitoringController::class, 'store'])->name('store');
        Route::get('/{monitoring}/edit', [MonitoringController::class, 'edit'])->name('edit');
        Route::put('/{monitoring}', [MonitoringController::class, 'update'])->name('update');
        Route::delete('/{monitoring}', [MonitoringController::class, 'destroy'])->name('destroy');
    });

    // Admin Laporan Routes
    Route::prefix('admin/laporan')->name('admin.laporan.')->group(function () {
        Route::get('/', [LaporanController::class, 'index'])->name('index');
        Route::get('/penerima-bantuan', [LaporanController::class, 'laporanPenerimaBantuan'])->name('penerima-bantuan');
        Route::get('/penerima-bantuan/pdf', [LaporanController::class, 'exportPdfPenerimaBantuan'])->name('penerima-bantuan.pdf');
        Route::get('/monitoring', [LaporanController::class, 'laporanMonitoring'])->name('monitoring');
        Route::get('/monitoring/pdf', [LaporanController::class, 'exportPdfMonitoring'])->name('monitoring.pdf');
        Route::get('/pendamping', [LaporanController::class, 'laporanPendamping'])->name('pendamping');
        Route::get('/pendamping/pdf', [LaporanController::class, 'exportPdfPendamping'])->name('pendamping.pdf');
        Route::post('/surat-pernyataan', [LaporanController::class, 'generateSuratPernyataan'])->name('surat-pernyataan');
    });
});
