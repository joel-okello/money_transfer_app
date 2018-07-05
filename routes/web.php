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



Route::get('/work', function () {
    return view('work');
});
Route::resource('contacts', 'ContactsController');
Route::resource('account', 'AccountController');
Route::resource('transactions', 'TransactionController');
Route::get('/register', function () {
    return view('register');
});


Route::get('/account_edit', function () {
	
	$account = null;
	$user_id_of_account = null;

    return view('account_edit_add',compact('account','user_id_of_account'));
});

Route::get('/contact_edit', function () {
    return view('contact_edit_add')->with('contact');
});





Route::get('/home', 'HomeController@index')->name('home');

