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
    return view('login');
});

Route::get('old1', 'Olduser@test');
Route::get('old', 'Olduser@index')->name('old');
Route::post('old', 'Olduser@store');

Route::post('old/fetch', 'Olduser@fetch')->name('old.fetch');


Route::resource('contacts', 'ContactsController');
Route::resource('account', 'AccountController');
Route::resource('transactions', 'TransactionController');
Route::get('/register', function () {
    return view('register');
});


Route::get('/contact_edit', function () {
    return view('contact_edit_add')->with('contact');
});





Route::get('/home', 'HomeController@index')->name('home');

