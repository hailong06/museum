<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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

Route::get('/welcome', ['as'=>'welcome', 'uses'=>'WelcomeController@index']);

Route::get('/visit', function () {return view('user.home.visit');});

Route::get('/blog', ['as'=>'blog', 'uses'=>'BlogController@index']);

Route::get('/blog-detail/{id}', ['as'=>'blog-detail', 'uses'=>'BlogController@detail']);

Route::get('/booking', ['as'=>'booking', 'uses'=>'BookingController@index']);

Route::get('/search', ['as'=>'search', 'uses'=>'SearchController@index']);

Route::get('/search/action', 'SearchController@action')->name('search.action');

Route::get('login', ['as'=>'login', 'uses'=>'login\AuthController@index'])->middleware('guest');

Route::post('login', ['as'=>'login', 'uses'=>'login\AuthController@login'])->middleware('guest');

Route::get('logout', ['as'=>'logout', 'uses'=>'login\AuthController@destroy'])->middleware('auth');

Route::group(['middleware' => ['auth']], function () {

    Route::get('logout', ['as'=>'logout', 'uses'=>'login\AuthController@destroy']);

    Route::get('/email/verify', 'login\VerificationController@show')->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', 'login\VerificationController@verify')->name('verification.verify')->middleware(['auth', 'signed']);

    Route::post('/email/resend', 'login\VerificationController@resend')->name('verification.resend');
});

Route::group(['prefix'=>'admin', 'middleware' => 'auth' ,'as'=>'admin.'], function () {
    Route::group(['middleware' => ['verified']], function () {
        Route::get('home', ['as'=>'home', 'uses'=>'admin\AdminController@dashboard']);

        Route::group(['prefix'=>'category','as'=>'category.'], function () {
            Route::get('home', ['as'=>'home', 'uses'=>'admin\CategoryController@index']);

            Route::get('create', ['as'=>'create', 'uses'=>'admin\CategoryController@create']);

            Route::post('store', ['as'=>'store', 'uses'=>'admin\CategoryController@store']);

            Route::get('destroy/{id}', ['as'=>'destroy', 'uses'=>'admin\CategoryController@destroy']);

            Route::get('edit/{id}', ['as'=>'edit', 'uses'=>'admin\CategoryController@edit']);

            Route::post('update', ['as'=>'update', 'uses'=>'admin\CategoryController@update']);
        });

        Route::group(['prefix'=>'blog','as'=>'blog.'], function () {
            Route::get('home', ['as'=>'home', 'uses'=>'admin\BlogController@index']);

            Route::get('create', ['as'=>'create', 'uses'=>'admin\BlogController@create']);

            Route::post('store', ['as'=>'store', 'uses'=>'admin\BlogController@store']);

            Route::get('destroy/{id}', ['as'=>'destroy', 'uses'=>'admin\BlogController@destroy']);

            Route::get('edit/{id}', ['as'=>'edit', 'uses'=>'admin\BlogController@edit']);

            Route::post('update', ['as'=>'update', 'uses'=>'admin\BlogController@update']);
        });

        Route::group(['prefix'=>'slider','as'=>'slider.'], function () {
            Route::get('home', ['as'=>'home', 'uses'=>'admin\SliderController@index']);

            Route::get('create', ['as'=>'create', 'uses'=>'admin\SliderController@create']);

            Route::post('store', ['as'=>'store', 'uses'=>'admin\SliderController@store']);

            Route::get('destroy/{id}', ['as'=>'destroy', 'uses'=>'admin\SliderController@destroy']);

            Route::get('edit/{id}', ['as'=>'edit', 'uses'=>'admin\SliderController@edit']);

            Route::post('update', ['as'=>'update', 'uses'=>'admin\SliderController@update']);
        });

        Route::group(['prefix'=>'user', 'middleware' => 'admin','as'=>'user.'], function () {
            Route::get('all-staff', ['as'=>'all-staff', 'uses'=>'admin\UserController@index']);

            Route::get('create', ['as'=>'create', 'uses'=>'admin\UserController@create']);

            Route::post('store', ['as'=>'store', 'uses'=>'admin\UserController@store']);

            Route::get('destroy/{id}',['as'=>'destroy', 'uses'=>'admin\UserController@destroy']);

            Route::get('edit/{id}',['as'=>'edit', 'uses'=>'admin\UserController@edit']);

            Route::post('update',['as'=>'update', 'uses'=>'admin\UserController@update']);
        });
    });
});
