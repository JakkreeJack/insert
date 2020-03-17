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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index');
Route::get('/about', 'AboutController@index');

Route::get('/action', 'CategoryController@action');
Route::get('/adventure', 'CategoryController@adventure');
Route::get('/drama', 'CategoryController@drama');
Route::get('/fantasy', 'CategoryController@fantasy');
Route::get('/game', 'CategoryController@game');
Route::get('/magic', 'CategoryController@magic');


Route::resource('anime', 'AnimeController');

Route::get('/main', 'MainController@index');
Route::post('/main/checklogin', 'MainController@checklogin');
Route::get('main/successlogin', 'MainController@successlogin');
Route::get('main/logout', 'MainController@logout');