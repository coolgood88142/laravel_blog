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

Route::get('select', 'SqlController@SelectData');

Route::post('/form', 'AddController@AddData');

Route::get('yahoo', 'YahooController@SelectTilie');

Route::get('/add', 'YahooController@GetAdd')->name('getAdd');

Route::post('/add', 'YahooController@AddTilie')->name('add');

Route::post('/delete', 'YahooController@DeleteTilie')->name('delete');

// Route::view('/update', 'update');

Route::get('/getUpdate/{id}', 'YahooController@GetUpdate')->name('getUpdate');

Route::post('/update', 'YahooController@UpdateTitle')->name('update');

Route::view('/adminlte', 'adminlte');

Route::view('/adminlte-test', 'adminlte-test');

Route::get('crawler', 'CrawlerController@RunCrawler');