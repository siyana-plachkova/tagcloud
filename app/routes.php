<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::get('photos/tag/{tag?}', array('as' => 'photos/tag', 'uses' => 'PhotosController@getTag'))->where('tag', '[a-z]+');

Route::get('photos/tag/{tag?}', 'PhotosController@getTag')->where('tag', '[a-z]+');
Route::controller('photos', 'PhotosController');
Route::controller('tags', 'TagsController');
Route::controller('/', 'HomeController');