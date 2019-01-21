<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

Auth::routes();


Route::get('/nuevoapto', 'HomeController@nuevoapto');
Route::get('/apartamento', 'HomeController@apartamento');
Route::get('/', 'HomeController@pagos');
Route::get('/condominios', 'HomeController@condominios');
Route::get('/persona', 'HomeController@persona');
Route::get('/nuevapersona', 'HomeController@nuevapersona');
Route::get('/removepersona/{id}', 'HomeController@removepersona');
Route::get('/editarpersona/{id}', 'HomeController@editarpersona');
Route::get('/nuevopago', 'HomeController@nuevopagos');
Route::get('/cargos', 'HomeController@cargos');
Route::get('/nuevocargo', 'HomeController@nuevocargo');
Route::get('/integrantes', 'HomeController@integrantes');
Route::get('/nuevointegrante', 'HomeController@nuevointegrante');
Route::get('/servicios', 'HomeController@servicios');
Route::get('/nuevoservicio', 'HomeController@nuevoservicio');
Route::get('/removerpago/{id}', 'HomeController@removerpago');
Route::get('/removergasto/{id}', 'HomeController@removergasto');
Route::get('/aprobar/{id}', 'HomeController@aprobar');
Route::get('/removerservicio/{id}', 'HomeController@removerservicio');
Route::get('/editarservicio/{id}', 'HomeController@editarservicio');
Route::get('/gastos', 'HomeController@gastos');
Route::get('/nuevosgastos', 'HomeController@nuevosgastos');
Route::get('/editargastos/{id}', 'HomeController@editargastos');
Route::get('/detallesgastos', 'HomeController@detallesgastos');
Route::get('/nuevodegastos', 'HomeController@nuevodegastos');
Route::get('/nuevacpagar', 'HomeController@nuevacpagar');
Route::get('/detallecpagar', 'HomeController@detallecpagar');
Route::get('/cuentascobrar', 'HomeController@cuentascobrar');
Route::get('/generarmensual', 'HomeController@generarmensual');
Route::get('/dashboard', 'HomeController@dashboard');
Route::get('/cancelarpago/{mes}', 'HomeController@cancelarpago');
Route::get('/pagardeuda/{mes}', 'HomeController@pagardeuda');
Route::get('/mispagos', 'HomeController@mispagos');
Route::get('/factura/{mes}', 'HomeController@factura');
Route::get('/estadisticas', 'HomeController@estadisticas');
Route::get('/eliminarcargo/{id}', 'HomeController@eliminarcargo');
Route::get('/editarcargo/{id}', 'HomeController@editarcargo');

Route::post('/createapto', 'HomeController@createapto');
Route::post('/updatepersona', 'HomeController@updatepersona');
Route::post('/guardarpersona', 'HomeController@guardarpersona');
Route::post('/createpago', 'HomeController@createpago');
Route::post('/updatecargo', 'HomeController@updatecargo');
Route::post('/createservicio', 'HomeController@createservicio');
Route::post('/updateservicio', 'HomeController@updateservicio');
Route::post('/guardargasto', 'HomeController@guardargasto');
Route::post('/updategasto', 'HomeController@updategasto');
Route::post('/crearcargo', 'HomeController@crearcargo');
Route::post('/crearintegrante', 'HomeController@crearintegrante');
Route::post('/searchpermes', 'HomeController@searchBymes');
Route::post('/generargastomensual', 'HomeController@generargastomensual');
Route::post('/pagardeudadelmes', 'HomeController@pagardeudadelmes');
Route::post('/reporte_pagos', 'HomeController@reporte_pagos');
Route::post('/reporte_gastos', 'HomeController@reporte_gastos');
Route::get('/reporte_inquilinos', 'HomeController@reporte_inquilinos');
Route::get('/reporte_cuentaspagar', 'HomeController@reporte_cuentaspagar');

