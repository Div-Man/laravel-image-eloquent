<?php

//use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request;

use App\Category;
use App\Services\Image;

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


Route::get('/about', 'HomeController@about');

Route::get('/', 'imagesController@index');

Route::get('/create', 'imagesController@create');

Route::post('/store', 'imagesController@store');

Route::get('/show/{id}', 'imagesController@show');

Route::get('/edit/{id}', 'imagesController@edit');

Route::post('/update/{id}', 'imagesController@update');

Route::get('/delete/{id}', 'imagesController@delete');

Route::get('/category/{id}', 'imagesController@categoryShow');