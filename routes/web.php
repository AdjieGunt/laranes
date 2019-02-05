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


Route::get('/', 'SellController@index');

Route::get('login', 'UsersController@login');

Route::get('customers', 'CustomersController@index');
Route::get('search_customers', 'CustomersController@search');
Route::post('new_customer', 'CustomersController@store');

Route::get('sell_in', 'SellController@index');
Route::get('sell_in_list', 'SellController@sell_list');
Route::get('sell_out_list', 'SellController@sell_list');

Route::get('sell_in_list/{id}/detail', 'SellController@sell_list_detail');
Route::get('sell_out_list/{id}/detail', 'SellController@sell_list_detail');

Route::post('sell_save', 'SellController@store');

Route::get('sell_out', 'SellController@sell_out_form');

Route::get('products', 'ProductController@index');
Route::post('product_add', 'ProductController@store');

Route::get('stock', 'StockController@stock_list');
Route::get('check_stock', 'StockController@check_stock_for_sell_out');
Route::post('stock/update_stock', 'StockController@update_stock');
Route::post('stock/delete_stock', 'StockController@delete_stock');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
