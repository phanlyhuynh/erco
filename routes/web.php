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

//Route::get('/', function () {
//    return view('frontend.home');
//});

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

//Route::get('/trangchu', 'HomeController@index')->name('trangchu');
//Route::get('/dangnhap', 'Frontend\HomeController@login');

Route::get('/home1', 'PageController@home1')->name('trangchu');
Route::get('/sanphamchitiet/{id}', 'PageController@detail')->name('sanphamchitiet');
Route::get('/showsanpham/{id}', 'PageController@showcate')->name('showcate');
Route::get('/deletecart/{id}', 'PageController@delete')->name('deletecart');
Route::name('search')->get('/search', 'PageController@search');
Route::post('/order', 'PageController@postorder')->name('order');
Route::get('/shoplist', 'PageController@shoplist');

Route::get('/shopping-cart', 'PageController@shoppingcart');
Route::get('/viewcart','PageController@viewcart')->name('muahang');
Route::post('/addToCart','PageController@addToCart')->name('addToCart');
Route::get('/{slug}', 'PageController@showDetailPost');
