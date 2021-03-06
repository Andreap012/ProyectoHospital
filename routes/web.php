<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
})->name('inicio');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('Admin/users','Admin\UserController')->middleware('can:administrar-usuarios');

Route::resource('hospital','HospitalController');

Route::resource('medico','MedicoController');

Route::resource('paciente','PacienteController');

Route::resource('sala','SalaController');

Route::resource('laboratorio','LaboratorioController');

Route::resource('detalle','DetalleController');

Route::resource('diagnostico','DiagnosticoController');

Route::resource('diagnos2','Diagnos2Controller');

Route::resource('consulta','ConsultaController');

Route::resource('Admin/users','Admin\UserController');

Route::post('hospital/guardar','HospitalController@store');

Route::get('hospitals/','HospitalController@listar');