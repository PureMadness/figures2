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

Route::group(['middleware' => ['auth']], function (\Illuminate\Routing\Router $router) {

    Route::get('/', 'FigureController@index')
        ->name('index');

    Route::get('/add', 'FigureController@add')
        ->name('figure.addForm');

    Route::post('/save/{figure?}', 'FigureController@save')
        ->name('figure.save')
        ->where('figure', '[0-9]+');

    Route::get('/statistics', 'FigureController@statistics')
        ->name('statistics');

    Route::get('/edit/{figure}', 'FigureController@edit')
        ->name('figure.edit')
        ->where('figure', '[0-9]+');

    Route::get('/delete/{figure}', 'FigureController@delete')
        ->name('delete')
        ->where('figure', '[0-9]+');

    Route::get('/users', 'UserController@index')
        ->name('users');

    Route::get('/user/{user}', 'FigureController@user')
        ->name('user.figures')
        ->where('user', '[0-9]+');

    Route::get('/favorites', 'UserController@favorites')
        ->name('favorites');

    Route::get('/addFav/{figure}', 'UserController@addFavorite')
        ->name('add.favorite')
        ->where('figure', '[0-9]+');

    Route::get('/deleteFav/{figure}', 'UserController@deleteFavorite')
        ->name('delete.favorite')
        ->where('figure', '[0-9]+');

    Route::group(['middleware' => ['admin']], function (\Illuminate\Routing\Router $router) {
        Route::get('/users/edit/{user}', 'UserController@edit')
            ->name('user.edit')
            ->where('user', '[0-9]+');

        Route::post('/users/save/{user}', 'UserController@save')
            ->name('user.save')
            ->where('user', '[0-9]+');

        Route::get('/users/delete/{user}', 'UserController@delete')
            ->name('user.delete')
            ->where('user', '[0-9]+');
    });
});


Route::get('/login', 'Auth\LoginController@auth')
    ->name('login');

Route::post('/login', 'Auth\LoginController@check')
    ->name('check.login');

Route::get('/register', 'Auth\RegisterController@register')
    ->name('register');

Route::post('/register', 'Auth\RegisterController@check')
    ->name('check.register');

Route::get('/logout', 'Auth\LoginController@logout')
    ->name('logout');

Route::get('/restore', 'MailController@restore')
    ->name('restore');

Route::get('/send', 'MailController@send')
    ->name('send');

Route::get('/changePassword/{user}', 'MailController@change')
    ->name('change.password')
    ->where('user', '[0-9]+');

Route::post('/changePassword/{user}', 'MailController@check')
    ->name('check.password')
    ->where('user', '[0-9]+');
