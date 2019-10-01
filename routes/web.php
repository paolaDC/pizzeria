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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'PizzaController@index')->name('home');

Route::group(['prefix'=>'pizza'], function (){
    Route::get('/', 'PizzaController@index');

    Route::get('/nueva', 'PizzaController@getNuevaPizza');
    Route::post('/nueva', 'PizzaController@postNuevaPizza');

    Route::get('/editar/{id}', 'PizzaController@getEditarPizza');
    Route::post('/editar', 'PizzaController@postEditarPizza');

    Route::post('/borrar', 'PizzaController@postBorrarPizza');
});
