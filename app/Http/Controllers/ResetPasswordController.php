<?php

namespace App\Http\Controllers;

use App\Services\SmsCenter;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    public function showResetForm()
    {
        return view('auth.passwords.sms.sms');
    }

    public function sendResetCode(Request $request)
    {
        $this->validate($request, [
            'phone' => 'required',
        ]);

        $smsCenter = new SmsCenter();
        $smsCode   = $this->generateSMSCode();
        $user      = User::where('phone', $request->phone)->first();

        if (null == $user) {
            return redirect()->back()->with('error', 'Пользователь не найден');
        }

        $user->sms_code = $smsCode;
        $user->save();

        $smsCenter->sendSMS($request->phone, $smsCode);

        return redirect()->route('password.showResetPasswordSmsForm', [
            'phone' => $request->phone
        ]);
    }

    public function showResetPasswordForm(Request $request)
    {
        return view('auth.passwords.sms.reset', [
            'phone' => $request->phone
        ]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'code'     => 'required',
            'phone'    => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        $user = User::where('phone', $request->phone)->first();

        if ((int)$request->code !== (int)$user->sms_code) {
            return redirect()->back()->with('error', 'Произошла ошибка при сбросе пароля! Не верно введен смс код');
        }

        if ($request->password !== $request->password_confirmation) {
            return redirect()->back()->with('error', 'Произошла ошибка при сбросе пароля! Пароли не совпадают');
        }

        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('login')->with('success', 'Пароль успешно сброшен');
    }

    private function generateSMSCode(): int
    {
        return mt_rand(1000, 9999);
    }
}
