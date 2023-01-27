<?php

use App\Http\Controllers\AnggaranDetailController;
use App\Http\Controllers\AnggaranKerjaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KegiatanRoleController;

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

Route::get('/test', function () {
    return view('table');
})->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::middleware('role:admin')->group(function () {
        Route::resource('roles', RoleController::class)->except('show');
        Route::resource('users', UserController::class)->except('show');
        Route::resource('kegiatans/role', KegiatanRoleController::class)->except('show');
        Route::resource('kegiatans/satuan', SatuanController::class)->except('show');
    });

    Route::resource('kegiatans/kegiatan', KegiatanController::class)->except('show');

    Route::name('anggarans.kerja.')->group(function () {
        Route::get('anggarans/kerja', [AnggaranKerjaController::class, 'index'])->name('index');
        Route::get('anggarans/kerja/{kerja}', [AnggaranKerjaController::class, 'show'])->name('show');
        Route::get('anggarans/kerja/{kerja}/create', [AnggaranKerjaController::class, 'create'])->name('create');
        Route::post('anggarans/kerja/{kerja}', [AnggaranKerjaController::class, 'store'])->name('store');
        Route::get('anggarans/kerja/{anggaran}/edit', [AnggaranKerjaController::class, 'edit'])->name('edit');
        Route::put('anggarans/kerja/{anggaran}', [AnggaranKerjaController::class, 'update'])->name('update');
        Route::delete('anggarans/kerja/{anggaran}', [AnggaranKerjaController::class, 'destroy'])->name('destroy');
    });

    Route::name('anggarans.belanja.')->group(function () {
        Route::get('anggarans/belanja', [AnggaranDetailController::class, 'index'])->name('index');
        Route::get('anggarans/belanja/{belanja}', [AnggaranDetailController::class, 'show'])->name('show');
        Route::get('anggarans/belanja/{belanja}/create', [AnggaranDetailController::class, 'create'])->name('create');
        Route::post('anggarans/belanja/{belanja}', [AnggaranDetailController::class, 'store'])->name('store');
        Route::get('anggarans/belanja/{anggaran}/edit', [AnggaranDetailController::class, 'edit'])->name('edit');
        Route::put('anggarans/belanja/{anggaran}', [AnggaranDetailController::class, 'update'])->name('update');
        Route::delete('anggarans/belanja/{anggaran}', [AnggaranDetailController::class, 'destroy'])->name('destroy');
    });

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});


Route::middleware('guest')->group(function () {
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'postLogin'])->name('postLogin');
});
