<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Registered;
use App\Services\SmsCenter;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendSMSCode implements ShouldQueue
{
    public function handle(Registered $event)
    {
        $user      = $event->user;
        $smsCode   = $this->generateSMSCode();
        $smsCenter = new SmsCenter();

        $smsCenter->sendSMS($user->phone, $smsCode);

        $smsCode = 1234;
        $user->sms_code = $smsCode;
        $user->save();

        // Сохранение ожидаемого SMS-кода в сессии
        session()->put('expected_sms_code', $smsCode);
        session()->put('user_id', $user->id);
    }

    private function generateSMSCode(): int
    {
        return mt_rand(1000, 9999);
    }
}
