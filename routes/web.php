<?php

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


Route::post('/auth',  'AuthorizeController@authenticate');

Route::get('/get-shoes', 'AuthorizeController@fetchShoes');

Route::resource('shoes', 'ShoesController');
Route::resource('users', 'usersController');

Route::get('/logout', function()
{
    Auth::logout();
    \Session::flush();
    return "Logout successfull";
});