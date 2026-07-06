<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('login');
    })->name('login');

    Route::post('/login', [UserController::class, 'login'])->name('login.attempt');
});

Route::middleware('auth')->group(function () {
    Route::get('/auditar', [AdminController::class, 'auditIndex'])->name('audit.index');
    Route::post('/auditar', [AdminController::class, 'audit'])->name('audit');

    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
});