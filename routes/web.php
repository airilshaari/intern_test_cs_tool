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
    if (\Illuminate\Support\Facades\Auth::check()) {
        return redirect()->route('dashboard');
    }

    return view('auth.login');
});

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/order', 'OrderController@index')->name('order');

Route::get('/user', 'UserController@index')->name('user');
Route::post('/addUser', 'UserController@addUser')->name('add_user');

Route::get('/resetPassword', 'UserController@resetPassword')->name('reset_password');
Route::post('/resetPasswordSubmit', 'UserController@resetPasswordSubmit')->name('reset_password_submit');