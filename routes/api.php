<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');
Route::group(['middleware' => 'auth:api'], function(){
    Route::get('transactions', 'API\TransactionController@index');
    Route::get('transaction/{customerId}/{transactionId}', 'API\TransactionController@show');
    Route::post('transaction', 'API\TransactionController@store');
    Route::put('transaction', 'API\TransactionController@update');
    Route::delete('transaction', 'API\TransactionController@delete');
    Route::post('customer', 'API\CustomerController@store');
});


