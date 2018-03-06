<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Auth::routes();
Route::get('switch-lang/{lang}', 'LanguageController@switchLang');
Route::get('/', 'HomeController@index');
Route::get('account', ['as' => 'account.dashboard', 'uses' => 'AccountController@dashboard']);

Route::get('poster/filter', ['as' => 'poster.filter', 'uses' => 'PosterController@filter']);
Route::get('poster/search', ['as' => 'poster.search', 'uses' => 'PosterController@search']);
Route::post('poster/selected/{poster}', ['as' => 'poster.selected', 'uses' => 'PosterController@select']);
Route::resource('poster', 'PosterController', ['except' => 'show']);
Route::model('poster', 'App\Poster');
Route::get('random', ['as' => 'poster.random', 'uses' => "PosterController@randomPoster"]);
Route::post('oeuvre/search', ['as' => 'oeuvre.search', 'uses' => 'OeuvreController@search']);

Route::post('cookie/set', ['as' => 'cookie.set', 'uses' => 'CookieController@set']);

Route::post('image', ['as' => 'image.store', 'uses' => 'ImageController@store']);
Route::delete('image/{image}', ['as' => 'image.destroy', 'uses' => 'ImageController@destroy']);
Route::model('image', 'App\Image');

Route::resource('selection', 'SelectionController');
Route::model('selection', 'App\Selection');
Route::get('selection-navigation', ['as' => 'selection.navigation', 'uses' => 'SelectionController@navigation']);
Route::get('selection-final', ['as' => 'selection.final', 'uses' => 'SelectionController@finalPage']);

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function(){
    Route::resource('oeuvre', 'OeuvreController', ['except' => ['show']]);
    Route::model('oeuvre', 'App\Oeuvre');
});
