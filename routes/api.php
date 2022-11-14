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

Route::get('/l', 'AccountController@showLogin')->name('Login');
Route::post('/login', 'AccountController@login')->name('AccountLogin');

//Route::get('/test/{id}', 'ChallengeController@delete');

Route::group(['middleware' => 'auth.jwt'], function () {
    Route::get('logout', 'AccountController@logout');
    Route::get('me', 'AccountController@me');
    Route::put('me', 'AccountController@changeInfo');
    Route::put('change_password', 'AccountController@changePassword');;
    Route::put('change_info/{id}', 'AccountController@changeInfoUser');
    Route::get('avatar', 'AccountController@getAvatar');
    Route::post('change_avatar', 'AccountController@changeAvt');
});

Route::group(['middleware' => 'admin'], function() {
    Route::get('all', 'AccountController@getAll');
    Route::post('send_message/{id}', 'AccountController@sendMessage');
});


Route::group(['middleware' => 'teacher'], function() {
    Route::get('students', 'AccountController@getStudents');

});
