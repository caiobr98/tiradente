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

//usuario
Route::post('/editar', 'Api\User\ApiController@editar');
Route::post('/editar-foto', 'Api\User\ApiController@editarFotoPerfil');

Route::post('/auth', 'Api\User\ApiController@auth');

Route::post('/store', 'Api\User\ApiController@store');


Route::post('/reset-password', 'Api\User\ApiController@resetPassword');

Route::post('/search', 'Api\User\ApiController@search');

Route::post('/listar', 'Api\User\ApiController@listarMolecula');

Route::post('/filtro', 'Api\User\ApiController@filtro');

Route::get('/search/{id}', 'Api\User\ApiController@show');

// Route::post('/search', 'Api\User\ApiController@search')->middleware('appAuth');

// Route::get('/search/{id}', 'Api\User\ApiController@show')->middleware('appAuth');
