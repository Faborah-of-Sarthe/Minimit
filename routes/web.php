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
Route::get('switch-lang/{lang}', 'LanguageController@switch');
Route::get('/', 'HomeController@index');
Route::get('account', ['as' => 'account.dashboard', 'uses' => 'AccountController@dashboard']);

Route::resource('poster', 'PosterController');
Route::model('poster', 'App\Poster');
Route::get('random', ['as' => 'poster.random', 'uses' => "PosterController@randomPoster"]);
Route::post('oeuvre/search', ['as' => 'oeuvre.search', 'uses' => 'OeuvreController@search']);

Route::resource('selection', 'SelectionController');
Route::model('selection', 'App\Selection');
Route::get('selection-navigation', ['as' => 'selection.navigation', 'uses' => 'SelectionController@navigation']);

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function(){
    Route::resource('oeuvre', 'OeuvreController', ['except' => ['show']]);
    Route::model('oeuvre', 'App\Oeuvre');
});
