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

Route::get('/welcome', function () {
    return view('user.home.welcome');
});
Route::group(['prefix'=>'admin','as'=>'admin.'], function(){
    Route::get('home',['as'=>'home', 'uses'=>'admin\AdminController@dashboard']);
});

