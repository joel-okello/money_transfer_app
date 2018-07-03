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
    return view('login');
});
Route::resource('contacts', 'ContactsController');
Auth::routes();
Route::get('/register', function () {
    return view('register');
});

Route::get('/contacts', function () {
    return view('contacts');
});
Route::get('/transactions', function () {
    return view('transactions');
});

Route::get('/home', 'HomeController@index')->name('home');

