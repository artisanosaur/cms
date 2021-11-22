<?php

use Illuminate\Support\Facades\Route;

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
Auth::routes();

Route::middleware(['auth'])->group(function() {
    Route::get('/', 'HomeController@index')
        ->name('home');

    //POSTS
    Route::group([
        'prefix' => 'post',
        'namespace' => 'Post',
        'as' => 'post.'
    ], function () {
        Route::get('/', 'PostController@index')
            ->name('list');

        Route::get('/show/{post}', 'PostController@show')
            ->name('post');

        Route::get('/create', 'PostController@create')
            ->name('create');

        Route::post('/submitCreate', 'PostController@submitCreate')
            ->name('submitCreate');

        Route::get('/edit/{post}', 'PostController@edit')
            ->name('edit');

        Route::post('/submitEdit/{post}', 'PostController@submitEdit')
            ->name('update');

        Route::delete('/delete/{post}', 'PostController@delete')
            ->name('delete');
    });

    // USERS
    Route::group([
        'prefix' => 'user',
        'namespace' => 'User',
        'as' => 'user.'
    ], function () {
        Route::get('/', 'UserController@index')
            ->name('list');

        Route::get('/show/{user}', 'UserController@show')
            ->name('show');

        Route::get('/edit/{user}', 'UserController@edit')
            ->name('edit');

        Route::post('/update/{user}', 'UserController@update')
            ->name('update');
    });

});

