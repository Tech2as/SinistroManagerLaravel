<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use App\Http\Controllers\SinistroController;
use Illuminate\Auth\Middleware\Authenticate;
use App\Http\Controllers\AuthController;

Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/register', [AuthController::class, 'cadastro'])->name('register');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth:sanctum');


Route::get('/cadastro', function () {
    return response()->json(["msg" => "teste"]);
});

Route::middleware(['auth:sanctum'])->group(function () {
    Route::apiResource('sinistros', SinistroController::class);
});