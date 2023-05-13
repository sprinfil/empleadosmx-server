<?php

use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\CurriculuController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\ExperienciaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VacanteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::controller(UserController::class)->group(function () {
    Route::get('/user/alta','alta');
    Route::get('/user/consulta_correo','consulta_correo');
    Route::get('/user/consulta_id','consulta_id');
});

Route::controller(CandidatoController::class)->group(function () {
    Route::get('/candidato/consulta_correo','consulta_correo');
    Route::get('/candidato/alta','alta');
    Route::get('/candidato/modificar','modificar');
    Route::get('/candidato/show','show');
    Route::get('/candidato/consulta','consulta');
});

Route::controller(EmpresaController::class)->group(function () {
    Route::get('/empresa/consulta_correo','consulta_correo');
    Route::get('/empresa/alta','alta');
    Route::get('/empresa/modificar','modificar');
});

Route::controller(VacanteController::class)->group(function () {
    Route::get('/vacante/alta','alta');
    Route::get('/vacante/consulta_empresaid','consulta_empresaid');
    Route::get('/vacante/filtro_titulo','filtro_titulo');
    Route::get('/vacante/consulta_id','consulta_id');
    Route::get('/vacante/modificar','modificar');
    Route::get('/vacante/eliminar','eliminar');
});

Route::controller(CurriculuController::class)->group(function () {
    Route::get('/curriculu/alta','alta');
    Route::get('/curriculu/modificar','modificar');
    Route::get('/curriculu/consulta/candidato_id','consulta_candidato_id');
});
Route::controller(ExperienciaController::class)->group(function () {
    Route::get('/expriencias/alta','alta');
    Route::get('/expriencias/show','show');
});
