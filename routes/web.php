<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\MataKuliahController;

Route::get('/', fn()=>redirect('/login'));

Route::get('/login',[AuthController::class,'login']);
Route::post('/login',[AuthController::class,'authenticate']);
Route::post('/logout',[AuthController::class,'logout']);

Route::middleware('auth')->group(function(){
    Route::get('/dashboard',[DashboardController::class,'index']);
    Route::resource('mahasiswa',MahasiswaController::class);
    Route::resource('jurusan',JurusanController::class);
    Route::resource('matakuliah',MataKuliahController::class);
});