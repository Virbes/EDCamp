<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\PrecioController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);

Route::group(['middleware' => 'auth:api'], function () {
    Route::apiResource('/precios', PrecioController::class);
    Route::apiResource('/empresas', EmpresaController::class);
    Route::apiResource('/alumnos', AlumnoController::class);
    Route::apiResource('/pagos', PagoController::class);
});
