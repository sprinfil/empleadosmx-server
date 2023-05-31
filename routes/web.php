<?php

use App\Http\Controllers\CandidatoController;
use App\Http\Controllers\CurriculuController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\ExperienciaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VacanteController;
use App\Http\Controllers\AplicacioneController;
use App\Http\Middleware\VerifyCsrfToken;

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
    Route::get('/candidato/consulta_postulantes','consulta_postulantes');
    Route::get('/candidato/consulta_id','consulta_id');
    Route::post('/candidato/modificarImagen','modificarImagen')->withoutMiddleware(VerifyCsrfToken::class);
    Route::get('/candidato/modificarImagen','modificarImagen');
    Route::get('/candidato/hola','hola');
});

Route::controller(EmpresaController::class)->group(function () {
    Route::get('/empresa/consulta_correo','consulta_correo');
    Route::get('/empresa/alta','alta');
    Route::get('/empresa/modificar','modificar');
    Route::get('/empresa/consulta_id','consulta_id');
    Route::get('/empresa/actualizar_num_aplicantes','actualizar_num_aplicantes');
});

Route::controller(VacanteController::class)->group(function () {
    Route::get('/vacante/alta','alta');
    Route::get('/vacante/consulta_empresaid','consulta_empresaid');
    Route::get('/vacante/filtro_titulo','filtro_titulo');
    Route::get('/vacante/consulta_id','consulta_id');
    Route::get('/vacante/modificar','modificar');
    Route::get('/vacante/eliminar','eliminar');
    Route::get('/vacante/filtro','filtro');
});

Route::controller(CurriculuController::class)->group(function () {
    Route::get('/curriculu/alta','alta');
    Route::get('/curriculu/modificar','modificar');
    Route::get('/curriculu/consulta/candidato_id','consulta_candidato_id');
});
Route::controller(ExperienciaController::class)->group(function () {
    Route::get('/experiencias/alta','alta');
    Route::get('/experiencias/show','show');
    Route::get('/experiencias/modificar','modificar');
    Route::get('/experiencias/consulta_id','consulta_id');
    Route::get('/experiencias/eliminar','eliminar');
});
Route::controller(AplicacioneController::class)->group(function () {
    Route::get('/aplicacion/alta','alta');
    Route::get('/aplicacion/postulaciones','postulaciones');
    Route::get('aplicaciones/checar_nuevos_candidatos','checar_nuevos_candidatos');
    Route::get('aplicaciones/eliminar_aplicacion','eliminar_aplicacion');
});
