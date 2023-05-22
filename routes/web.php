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

Route::get('/verify-sms-code', 'Auth\VerificationController@showSMSCodeForm')->name('verify.sms');
Route::post('/verify-sms-code', 'Auth\VerificationController@verifySMSCode');

Auth::routes();


Route::get('/profile', 'UserController@profile')->name('profile');
Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});