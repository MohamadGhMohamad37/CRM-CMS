<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegiesterController;

Route::get('/login',[LoginController::class,'index'])->name('login.page');
Route::post('/login',[LoginController::class,'login'])->name('login.store');
Route::get('/regiester',[RegiesterController::class,'index'])->name('regiester.page');
Route::post('/regiester',[RegiesterController::class,'regiester'])->name('regiester.store');
