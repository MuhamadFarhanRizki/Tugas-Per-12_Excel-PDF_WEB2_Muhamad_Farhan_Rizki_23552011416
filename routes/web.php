<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\MataKuliahController;

Route::get('/', fn() => redirect('/login'));

Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index']);

    // ================== MAHASISWA ==================
    Route::get('/mahasiswa/export-csv', [MahasiswaController::class, 'exportCsv'])
        ->name('mahasiswa.export-csv');

    Route::get('/mahasiswa/print', [MahasiswaController::class, 'print'])
        ->name('mahasiswa.print');

    Route::get('/mahasiswa/excel', [MahasiswaController::class, 'exportExcel'])
        ->name('mahasiswa.excel');

    Route::resource('mahasiswa', MahasiswaController::class);

    // ================== JURUSAN ==================
    Route::get('/jurusan/export-csv', [JurusanController::class, 'exportCsv'])
        ->name('jurusan.export-csv');

    Route::get('/jurusan/print', [JurusanController::class, 'print'])
        ->name('jurusan.print');

    Route::get('/jurusan/excel', [JurusanController::class, 'exportExcel'])
        ->name('jurusan.excel');

    Route::resource('jurusan', JurusanController::class);

    // ================== MATA KULIAH ==================
    Route::get('/matakuliah/export-csv', [MataKuliahController::class, 'exportCsv'])
        ->name('matakuliah.export-csv');

    Route::get('/matakuliah/print', [MataKuliahController::class, 'print'])
        ->name('matakuliah.print');

    Route::get('/matakuliah/excel', [MataKuliahController::class, 'exportExcel'])
        ->name('matakuliah.excel');

    Route::resource('matakuliah', MataKuliahController::class);
});