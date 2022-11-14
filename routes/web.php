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
Route::get('/login', 'App\Http\Controllers\LoginController@viewLogin')->name('viewlogin')->middleware('logged');
Route::post('/login', 'App\Http\Controllers\LoginController@login')->name('login');
Route::get('/logout', 'App\Http\Controllers\LoginController@logout')->name('logout');
Route::group(['middleware' => 'authcheck'], function(){
    Route::get('/home', 'App\Http\Controllers\UserController@home')->name('home');
    Route::get('/welcome', 'App\Http\Controllers\UserController@welcome')->name('welcome');
    Route::get('/student', 'App\Http\Controllers\UserController@student')->name('student');
    Route::get('/addsv', 'App\Http\Controllers\UserController@viewaddsv')->name('viewaddsv');
    Route::post('/addsv', 'App\Http\Controllers\UserController@addsv')->name('addsv');
    Route::get('/delete/{id}', 'App\Http\Controllers\UserController@delete');
    Route::get('/edit/{id}', 'App\Http\Controllers\UserController@edit')->name('edit');
    Route::post('/edit/{id}', 'App\Http\Controllers\UserController@update')->name('update');
    Route::get('/profile/{id}', 'App\Http\Controllers\UserController@profile')->name('profile');
    Route::post('/profile/{id}', 'App\Http\Controllers\UserController@updateprofile')->name('updateprofile');
    Route::get('/all', 'App\Http\Controllers\UserController@viewall')->name('viewall');
    Route::get('/message/{id}', 'App\Http\Controllers\UserController@message')->name('mesage');
    Route::post('/message/{id}', 'App\Http\Controllers\UserController@sendmessage')->name('sendmesage');
});



