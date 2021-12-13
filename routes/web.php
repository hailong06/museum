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
Route::get('/visit', function () {
    return view('user.home.visit');
});
Route::get('/blog', function () {
    return view('user.home.blog');
});
Route::group(['prefix'=>'admin','as'=>'admin.'], function(){
    Route::get('home',['as'=>'home', 'uses'=>'admin\AdminController@dashboard']);

    Route::group(['prefix'=>'category','as'=>'category.'], function(){
        Route::get('home',['as'=>'home', 'uses'=>'admin\CategoryController@index']);

        Route::get('create',['as'=>'create', 'uses'=>'admin\CategoryController@create']);

        Route::post('store',['as'=>'store', 'uses'=>'admin\CategoryController@store']);

        Route::get('destroy/{id}',['as'=>'destroy', 'uses'=>'admin\CategoryController@destroy']);

        Route::get('edit/{id}',['as'=>'edit', 'uses'=>'admin\CategoryController@edit']);

        Route::post('update',['as'=>'update', 'uses'=>'admin\CategoryController@update']);
    });

    Route::group(['prefix'=>'blog','as'=>'blog.'], function(){
        Route::get('home',['as'=>'home', 'uses'=>'admin\BlogController@index']);

        Route::get('create',['as'=>'create', 'uses'=>'admin\BlogController@create']);

        Route::post('store',['as'=>'store', 'uses'=>'admin\BlogController@store']);
    });
});

