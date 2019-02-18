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

Route::group(['middleware' => ['auth']], function (\Illuminate\Routing\Router  $router) {

    Route::get('/', 'FigureController@index')
        ->name('index');

    Route::get('/add', 'FigureController@add')->name('figure.addForm');

    Route::post('/save/{figure?}', 'FigureController@save')
        ->name('figure.save')
        ->where('figure', '[0-9]+');

    Route::get('/statistics', 'FigureController@statistics')->name('statistics');

    Route::get('/edit/{figure}', 'FigureController@edit')->name('figure.edit')
        ->where('figure', '[0-9]+');

    Route::get('/delete/{figure}', 'FigureController@delete')
        ->name('delete')
        ->where('figure', '[0-9]+');
});


Route::get('/login', 'Auth\LoginController@auth')->name('login');

Route::post('/login', 'Auth\LoginController@check')->name('check.login');

Route::get('/register', 'Auth\RegisterController@register')->name('register');

Route::post('/register', 'Auth\RegisterController@check')->name('check.register');

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');