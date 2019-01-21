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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/',   'PagesController@index');

Route::post('/response', 'PagesController@response');
Route::get('/pages',   'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/contact', 'PagesController@contact');

Route::get('/ticket/index', 'TicketsController@index');

Route::get('/ticket/create', 'TicketsController@create');
Route::post('/ticket/create', 'TicketsController@store');

Route::get('/ticket/{id}/show', 'TicketsController@show');
Route::get('/ticket/{id}/edit', 'TicketsController@edit');
Route::get('/ticket/{id}/del', 'TicketsController@destroy');
Route::post('/ticket/{id}', 'TicketsController@update');

