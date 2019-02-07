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

Route::get('/', 'FigureController@index')->name('index');

Route::get('/add', 'FigureController@add')->name('figure.addForm');

Route::post('/save', 'FigureController@save')->name('figure.save');

Route::get('/statistics', 'FigureController@statistics')->name('statistics');

Route::get('/delete/{figure}', 'FigureController@delete')
    ->name('delete')
    ->where('figure', '[0-9]+')
;

