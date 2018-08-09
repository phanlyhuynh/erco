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
    return view('frontend.home');
});

Route::group(['prefix' => '/admin', 'middleware' => 'CheckRole'], function ()
{
    Route::get('/', 'Admin\DashboardController@index');
    Route::resource('categories', 'Admin\CategoryController');
    Route::resource('brands', 'Admin\BrandController');
    Route::resource('products', 'Admin\ProductController');
    Route::resource('posts', 'Admin\PostController');
    Route::resource('orders', 'Admin\OrderController');
    Route::resource('users', 'Admin\UserController');
});
Auth::routes();

Route::get('/trangchu', 'HomeController@index')->name('trangchu');
Route::get('/dangnhap', 'Frontend\HomeController@login');