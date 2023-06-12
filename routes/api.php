<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KaryawanController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [AuthController::class, 'login']);

Route::group(['prefix' => 'karyawan', 'as' => 'karyawan.'], function() {
   Route::get('/test', [KaryawanController::class, function() {
      return "TESTTT";
   }]);
   Route::put('/{nik}', [KaryawanController::class, 'update']);
});


