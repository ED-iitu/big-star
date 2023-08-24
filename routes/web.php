<?php

use App\Http\Controllers\BackupController;
use App\Http\Controllers\ResetPasswordController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('setlocale/{locale}', function($lang) {
    Session::put('locale', $lang);

    return redirect()->back();
})->name('setLocale');

Route::get('setcurrency/{currency}', function($currency) {
    Session::put('currency', $currency);

    return redirect()->back();
})->name('setCurrency');

Route::group(['middleware'=>'language'],function ()
{
    Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/news/{id}', [\App\Http\Controllers\HomeController::class, 'getNewsById'])->name('news');
    Route::get('package/{id}', [\App\Http\Controllers\PocketController::class, 'getPackage'])->name('package');
    Route::post('transaction', [\App\Http\Controllers\PocketController::class, 'createCheckPayment'])->name('transaction');
    Route::post('buy-pocket', [\App\Http\Controllers\PocketController::class, 'buyPocket'])->name('buyPocket');

    Route::get('/verify-sms-code', 'Auth\VerificationController@showSMSCodeForm')->name('verify.sms');
    Route::post('/verify-sms-code', 'Auth\VerificationController@verifySMSCode');

    Route::post('/user/update-password', [\App\Http\Controllers\UserController::class, 'updatePassword'])->name('profile.updatePassword');
    Route::post('/user/update-profile', [\App\Http\Controllers\UserController::class, 'updateProfileData'])->name('profile.updateProfile');
    Route::post('/user/create-withdraw', [\App\Http\Controllers\UserController::class, 'createWithdrawRequest'])->name('user.createWithdraw');

    Route::get('/password/resetBySms', [ResetPasswordController::class, 'showResetForm'])->name('password.resetBySms');
    Route::post('/password/send-sms-code', [ResetPasswordController::class, 'sendResetCode'])->name('password.sendResetSmsCode');
    Route::get('/password/showResetPasswordForm', [ResetPasswordController::class, 'showResetPasswordForm'])->name('password.showResetPasswordSmsForm');
    Route::post('/password/resetByCode', [ResetPasswordController::class, 'resetPassword'])->name('password.resetPasswordBySms');
    Route::get('/backup', [BackupController::class, 'createBackup'])->name('backup.create');


    Auth::routes();


    Route::get('/profile', 'UserController@profile')->name('profile');
    Route::get('/home', 'HomeController@index')->name('home');
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

