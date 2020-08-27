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
Route::get('/', 'ArticleController@index')->name('articles.index');

Route::resource('/articles', 'ArticleController')->except(['index', 'show'])->middleware('auth');
Route::resource('/articles', 'ArticleController')->only(['show']);



Route::resource('/users', 'UserController')->only(['update', 'show', 'edit']);


Route::prefix('search')->group(function() {
  Route::get('/users', 'UserController@search')->name('users.search');
  Route::get('/articles', 'ArticleController@search')->name('articles.search')->middleware('auth');
});


Route::prefix('users')->name('users.')->group(function() {
  Route::middleware('auth')->group(function() {
    Route::put('/{user}/follow', 'UserController@follow')->name('follow');
    Route::delete('/{user}/follow', 'UserController@unfollow')->name('unfollow');
  });
});



Route::get('/home', 'HomeController@index')->name('home');

