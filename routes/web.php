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

Route::get('/', 'HashController@create');
Route::get('/hash', 'HashController@create');
Route::get('/lookup', 'HashController@lookup');

Route::post('/hash', 'HashController@store');
Route::post('/lookup', 'HashController@show');

Route::get('/contact', 'MessageController@create');
Route::post('/contact', 'MessageController@store');
Route::get('/thanks', 'MessageController@thanks');