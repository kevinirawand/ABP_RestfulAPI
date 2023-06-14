<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KaryawanController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthController::class, 'login'])->name('login');


Route::group(['prefix' => 'karyawan', 'as' => 'karyawan.'], function() {
   Route::get('/{nik}', [KaryawanController::class, 'show']);
   Route::put('/{nik}', [KaryawanController::class, 'update']);
});

// Route::get('/karyawan/{nik}', [KaryawanController::class, 'show']);