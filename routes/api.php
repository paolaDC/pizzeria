<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/catalogo', 'ApiController@getCatalogo');

Route::group(['prefix'=>'pizza'], function (){
    Route::post('/', 'ApiController@getPizza');
    Route::post('/nueva', 'ApiController@postNuevaPizza');
    Route::post('/editar', 'ApiController@postEditarPizza');
    Route::post('/borrar', 'ApiController@postBorrarPizza');
});


