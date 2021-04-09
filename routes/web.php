<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')->name('home');

//Blog & Documents
Route::get('/books/', 'BookController@index')->name('books');
Route::get('/books/{id}', 'BookController@show')->name('book');
//-----
//Auth::routes();
Auth::routes(['register' => false]);
// Admin Panel
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' =>'auth'],
    function () {
        Route::get('/', 'DashboardController@index')->name('admin');
        Route::resource('/books', 'BookController');
        Route::resource('/authors', 'AuthorController');
        Route::get('/author/{id}/books', 'BookController@author')->name('author_books');
//user profile part
        Route::get('/profile', 'ProfileController@index')->name('profile.index');
        Route::get('/profile/edit', 'ProfileController@edit')->name('profile.edit');
        Route::put('/profile', 'ProfileController@update')->name('profile.update');
    });

//-----



