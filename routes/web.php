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

Auth::routes(['register' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('category', 'CategoryController');
Route::resource('discount', 'DiscountController');
route::patch('barang/update/{item}','DistributorController@update')->name('barang.update');
Route::resource('distributor', 'DistributorController');
Route::resource('transaction', 'TransactionController');
Route::resource('detailtransaction', 'DetailTransactionController');
Route::get('getitem/{id}', 'DistributorController@getitem')->name('getitem');
Route::get('getavailabletranscation', 'TransactionController@getavailabletranscation')->name('getavailabletranscation');
Route::get('getbasket/{id}', 'DetailTransactionController@getbasket')->name('getbasket');
