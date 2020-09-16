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
Route::resource('/users', 'UserController')->only(['show', 'edit', 'update', 'destroy']);


Route::prefix('articles')->name('articles.')->group(function () {
  Route::put('/{article}/keep', 'ArticleController@keep')->name('keep')->middleware('auth');
  Route::delete('/{article}/keep', 'ArticleController@unkeep')->name('unkeep')->middleware('auth');
  Route::delete('/{article}/imageDestroy', 'ArticleController@imageDestroy')->name('imageDestroy')->middleware('auth');
});

Route::prefix('users')->name('users.')->group(function() {
  Route::middleware('auth')->group(function() {
    Route::put('/{user}/follow', 'UserController@follow')->name('follow');
    Route::delete('/{user}/follow', 'UserController@unfollow')->name('unfollow');
    Route::get('/{user}/keeps', 'UserController@keepIndex')->name('keep');
    Route::get('/{user}/articles', 'UserController@myArticle')->name('articles');
    Route::get('/{user}/profileEdit', 'UserController@profileEdit')->name('profileEdit');
    Route::patch('/{user}/profileUpdate', 'UserController@profileUpdate')->name('profileUpdate');
    Route::get('/{user}/PRedit', 'UserController@PRedit')->name('PRedit');
    Route::patch('/{user}/PRupdate', 'UserController@PRupdate')->name('PRupdate');
    Route::patch('/{user}/imageUpdate', 'UserController@imageUpdate')->name('imageUpdate');
  });
});

Route::get('/confirm', 'ArticleController@confirm')->name('articles.confirm')->middleware('auth');
Route::post('/confirm', 'ArticleController@send')->name('articles.send')->middleware('auth');
Route::get('/confirEdit', 'ArticleController@confirmEdit')->name('articles.confirmEdit')->middleware('auth');
Route::patch('/confirmEdit', 'ArticleController@sendPatch')->name('articles.sendPatch')->middleware('auth');

Route::get('/articles', 'ArticleController@search')->name('articles.search')->middleware('auth');
Route::get('/users', 'UserController@search')->name('users.search')->middleware('auth');



Route::get('/home', 'HomeController@index')->name('home');

