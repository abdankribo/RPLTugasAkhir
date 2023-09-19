<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\GajiController;
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

Route::get('/', function () {
    return view('login');
});

Route::get('/dashboard', function (){
    return view('dashboard');
} )->name('dashboard');

// Route::get('/karyawan', function (){
//     return view('/karyawan/karyawan');
// } )->name('karyawan');

// Route::get('/gaji', function (){
//     return view('/gaji/gaji');
// } )->name('gaji');

Route::get('/karyawan/edit_user/', function (){
    return view('/karyawan/edit_karyawan');
} )->name('edit_karyawan');

Route::get('/admin/adduser/', function (){
    return view('/karyawan/add_karyawan');
} )->name('add_karyawan');

Route::post('/', [UserController::class, 'login_action'])->name('login.action');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
//////////
Route::get('/karyawan', [KaryawanController::class, 'index'] )->name('karyawan');
Route::get('/absensi', [AbsensiController::class, 'index'] )->name('absensi');
Route::get('/gaji', [GajiController::class, 'index'] )->name('gaji.index');
Route::get('/absensi/add', [AbsensiController::class, 'add'] )->name('absensi.add');
Route::get('/karyawan/add', [KaryawanController::class, 'add'] )->name('karyawan.add');


Route::get('/karyawan/edit_user/', function (){
    return view('/karyawan/add_karyawan');
} )->name('edit_karyawan');

Route::post('/', [UserController::class, 'login_action'])->name('login.action');
Route::post('/absensi/simpan', [AbsensiController::class, 'simpan'])->name('absensi.simpan');
Route::post('/karyawan/simpan', [KaryawanController::class, 'store'])->name('karyawan.store');
// Route::post('/gaji/data', [GajiController::class, 'gaji'] )->name('gaji.action');
Route::get('/gaji/data', [GajiController::class, 'gaji'] )->name('gaji.action');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::post('/gaji/data/generate-pdf',[GajiController::class, 'topdf'])->name('pdf');