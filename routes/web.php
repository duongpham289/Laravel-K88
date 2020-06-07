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

// use Symfony\Component\Routing\Route;

//front-end route
Route::group(['namespace' => 'Client'], function () {

    Route::get('', 'HomeController@index');
    Route::get('about', 'HomeController@about');
    Route::get('contact', 'HomeController@contact');

    Route::group(['prefix' => 'cart'], function () {
        Route::get('', 'CartController@index');
        Route::get('checkout', 'CartController@checkout');
        Route::get('complete', 'CartController@complete');
    });

    Route::group(['prefix' => 'product'], function () {
        Route::get('', 'ProductController@index');
        Route::get('{category}', 'ProductController@index');
        Route::get('{category}/{product}', 'CartController@detail');
    });
});

//back-end route
Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin'
], function () {

    Route::group(['prefix' => 'product'], function () {
        Route::get('','ProductController@index');
        Route::get('create','ProductController@create');
        Route::post('','ProductController@store');
        Route::get('{product}/edit','ProductController@edit');
        Route::put('{product}','ProductController@update');
        Route::delete('{product}','ProductController@destroy');

    });
    Route::resources([
        'users'=> 'UserController',
        'category'=> 'CategoryController'
    ]);
    Route::group(['prefix' => 'login'], function () {
        Route::get('login','LoginController@showLoginForm');
        Route::post('login','LoginController@login');
        Route::post('logout','LoginController@logout');
    });
    Route::group(['prefix' => 'order'], function () {
        Route::get('','OrderController@index');
        Route::get('processed','OrderController@processed');
        Route::get('{order}/edit','OrderController@edit');
        Route::put('{order}','OrderController@update');
    });
    Route::get('','DashboardController');
});
