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
    return view('layouts');
});

Route::get('/c', function () {
    return view('child');
});

Route::get('/form', 'AddController@show');

Route::get('test/{name}', 'TestController@show');

Route::get('select', 'SqlController@selectData');

Route::post('/form', 'AddController@addData');

Route::get('yahoo', 'YahooController@selectTilie');

Route::get('/add', 'YahooController@getAdd')->name('getAdd');

Route::post('/add', 'YahooController@addTilie')->name('add');

Route::post('/delete', 'YahooController@deleteTilie')->name('delete');

Route::get('/getUpdate/{id}', 'YahooController@getUpdate')->name('getUpdate');

Route::post('/update', 'YahooController@updateTitle')->name('update');

Route::view('/adminlte', 'adminlte');

Route::view('/adminlte-test', 'adminlte-test');

Route::get('crawler', 'CrawlerController@runCrawler');