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

Route::get('/form', 'AddController@AddData');

Route::get('test/{name}', 'TestController@show');

Route::get('select', 'SqlController@SelectData');

Route::post('/form', 'AddController@show');