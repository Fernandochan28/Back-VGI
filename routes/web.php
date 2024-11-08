<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HistorialPacienteController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ResultadoTestController;
use app\Http\Controllers\UserController;
use App\Http\Middleware\CorsMiddleware;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('pacientes', PacienteController::class);
Route::resource('doctores', DoctorController::class);
Route::resource('historiales', HistorialPacienteController::class);
Route::resource('tests', TestController::class);
Route::resource('resultados', ResultadoTestController::class);
Route::post('/users', [UserController::class, 'store']);
Route::post('/pacientes', [PacienteController::class, 'store']);

Route::middleware([CorsMiddleware::class])->group(function () {
    Route::get('/user', [UserController::class, 'index']);
    // Otras rutas que necesiten CORS
});