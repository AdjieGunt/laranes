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

// Route::get('/', function () {
//     return view('admin_template');
// });


Route::get('/', 'SellController@index')->middleware('auth');

Route::get('login', 'UsersController@login');
Route::get('logout', 'UsersController@logout');

Route::get('customers', 'CustomersController@index')->middleware('auth');
Route::get('customers/{id}/edit', 'CustomersController@edit');
Route::get('customers/{id}/delete', 'CustomersController@delete');

Route::post('customers/edit', 'CustomersController@patch')->middleware('auth');

Route::get('search_customers', 'CustomersController@search')->middleware('auth');
Route::post('new_customer', 'CustomersController@store')->middleware('auth');

Route::get('sell_in', 'SellController@index')->middleware('auth');;
Route::get('sell_in_list', 'SellController@sell_list')->middleware('auth');
Route::get('sell_out_list', 'SellController@sell_list')->middleware('auth');

Route::get('sell_in_list/{id}/detail', 'SellController@sell_list_detail');
Route::get('sell_out_list/{id}/detail', 'SellController@sell_list_detail');

Route::post('sell_save', 'SellController@store')->middleware('auth');

Route::get('sell_out', 'SellController@sell_out_form')->middleware('auth');

Route::get('products', 'ProductController@index')->middleware('auth');
Route::get('products/delete/{id}', 'ProductController@delete');
Route::post('product_add', 'ProductController@store')->middleware('auth');

Route::get('stock', 'StockController@stock_list')->middleware('auth');
Route::get('check_stock', 'StockController@check_stock_for_sell_out')->middleware('auth');
Route::post('stock/update_stock', 'StockController@update_stock')->middleware('auth');
Route::post('stock/delete_stock', 'StockController@delete_stock')->middleware('auth');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
