<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\accesoController;
use App\Http\Controllers\usuariosController;
use App\Http\Controllers\pacientesController;
use App\Http\Controllers\enfermedadesController;
use App\Http\Controllers\rolesController;
use App\Http\Controllers\datosaludController;
use App\Http\Controllers\consultasController;
use App\Http\Controllers\TratamientosController;
use App\Http\Controllers\MConsultasController;

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
    return view('auth.login');
});

Route::resource('pacientes','App\Http\Controllers\pacientesController');
Route::resource('enfermedades','App\Http\Controllers\enfermedadesController');
Route::resource('roles','App\Http\Controllers\rolesController');

#Modulo Alan 
Route::get('mtratamiento',[TratamientosController::class,'tratamiento'])->name('tratamiento');



#Modulo Mariana
Route::get('mconsultas',[MConsultasController::class,'consulta'])->name('consulta');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dash', function () {
        return view('dash.index');
    })->name('dash');
});

//login
//Route::get('login',[accesoController::class,'login'])->name('login');
Route::POST('valida',[accesoController::class,'valida'])->name('valida');
Route::get('cerrarsesion',[accesoController::class,'cerrarsesion'])->name('cerrarsesion');

//Usuarios
Route::get('reporteU',[usuariosController::class,'reporteU'])->name('reporteUsuario');
Route::get('createU',[usuariosController::class,'createU'])->name('altaUsuario');
Route::POST('storeU',[usuariosController::class,'storeU'])->name('almacenaUsuario');
Route::get('editU/{id}',[usuariosController::class,'editU'])->name('modificaUsuario');
Route::POST('updateU',[usuariosController::class,'updateU'])->name('guardaUsuario');
Route::get('destroyU/{id}',[usuariosController::class,'destroyU'])->name('eliminaUsuario');

//Pacientes
Route::get('reporteP',[pacientesController::class,'reporteP'])->name('reportePaciente');
Route::get('createP',[pacientesController::class,'createP'])->name('altaPaciente');
Route::POST('storeP',[pacientesController::class,'storeP'])->name('almacenaPaciente');
Route::get('editP/{id}',[pacientesController::class,'editP'])->name('modificaPaciente');
Route::POST('updateP',[pacientesController::class,'updateP'])->name('guardaPaciente');
Route::get('destroyP/{id}',[pacientesController::class,'destroyP'])->name('eliminaPaciente');

//Roles
Route::get('reporteR',[rolesController::class,'reporteR'])->name('reporteRoles');
Route::get('createR',[rolesController::class,'createR'])->name('altaRoles');
Route::POST('storeR',[rolesController::class,'storeR'])->name('almacenaRoles');
Route::get('editR/{id}',[rolesController::class,'editR'])->name('modificaRoles');
Route::POST('updateR',[rolesController::class,'updateR'])->name('guardaRoles');
Route::get('destroyR/{id}',[rolesController::class,'destroyR'])->name('eliminaRoles');

//Datosalud
Route::get('reporteD',[datosaludController::class,'reporteD'])->name('reporteDatosalud');
Route::get('createD',[datosaludController::class,'createD'])->name('altaDatosalud');
Route::POST('storeD',[datosaludController::class,'storeD'])->name('almacenaDatosalud');
Route::get('editD/{id}',[datosaludController::class,'editD'])->name('modificaDatosalud');
Route::POST('updateD',[datosaludController::class,'updateD'])->name('guardaDatosalud');
Route::get('destroyD/{id}',[datosaludController::class,'destroyD'])->name('eliminaDatosalud');

//Enfermedades
Route::get('reporteE',[enfermedadesController::class,'reporteE'])->name('reporteEnfermedades');
Route::get('createE',[enfermedadesController::class,'createE'])->name('altaEnfermedades');
Route::POST('storeE',[enfermedadesController::class,'storeE'])->name('almacenaEnfermedades');
Route::get('editE/{id}',[enfermedadesController::class,'editE'])->name('modificaEnfermedades');
Route::POST('updateE',[enfermedadesController::class,'updateE'])->name('guardaEnfermedades');
Route::get('destroyE/{id}',[enfermedadesController::class,'destroyE'])->name('eliminaEnfermedades');

//Consultas
Route::get('reporteC',[consultasController::class,'reporteC'])->name('reporteConsultas');
Route::get('createC',[consultasController::class,'createC'])->name('altaConsultas');
Route::POST('storeC',[consultasController::class,'storeC'])->name('almacenaConsultas');
Route::get('editC/{id}',[consultasController::class,'editC'])->name('modificaConsultas');
Route::POST('updateC',[consultasController::class,'updateC'])->name('guardaConsultas');
Route::get('destroyC/{id}',[consultasController::class,'destroyC'])->name('eliminaConsultas');
