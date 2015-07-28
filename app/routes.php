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

URL::forceRootUrl('http://imagga.com/tagcloud');

Route::get('photos/tag/{tag?}', 'PhotosController@getTag')->where('tag', '[a-z]+');
Route::controller('photos', 'PhotosController');
Route::controller('tags', 'TagsController');
Route::controller('/', 'HomeController');