<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use App\Http\Controllers\SinistroController;

Route::apiResource('sinistros', SinistroController::class);

Route::get('/', function () {
    return response()->json(["msg" => "teste"]);
});