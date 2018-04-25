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

Auth::routes();

Route::get('/', function () {
    $transactions = \App\Transaction::orderBy('created_at', 'asc')->with('customer')->get();

    return view('transactions', [
        'transactions' => $transactions
    ]);
})->middleware('auth');

