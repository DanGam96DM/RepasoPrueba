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

Route::get('/', function () {
    return view('layouts.admin');
});
Route::resource('categoria', 'CategoriaController');
Route::get('categoriaDatos', 'CategoriaController@categoriaDatos')->name('categorias');
Route::resource('persona', 'PersonaController');
Route::get('personaDatos', 'PersonaController@personaDatos')->name('personas');
Route::resource('producto', 'ProductoController');
Route::get('productoDatos', 'ProductoController@productoDatos')->name('productos');
Route::resource('ingreso', 'IngresoController');
Route::get('ingresoDatos', 'IngresoController@ingresoDatos')->name('ingresos');