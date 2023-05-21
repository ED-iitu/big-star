<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    public function showSMSCodeForm()
    {
        return view('auth.sms_verification');
    }

    public function verifySMSCode(Request $request)
    {
        // Валидация введенного SMS-кода
        $request->validate([
            'sms_code' => 'required|string',
        ]);

        // Проверка соответствия введенного SMS-кода ожидаемому значению
        $expectedCode = $request->session()->get('expected_sms_code');

        if ($request->input('sms_code') == $expectedCode) {
            // Аутентификация пользователя
            Auth::loginUsingId($request->session()->pull('user_id'));

            return redirect('/');
        } else {
            return back()->withErrors(['sms_code' => 'Неправильный SMS-код']);
        }
    }
}
