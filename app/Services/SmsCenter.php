<?php
namespace App\Services;

use GuzzleHttp\Client;

class SmsCenter
{
    public function sendSMS(string $phoneNumber, int $smsCode): string
    {
        $client = new Client();
        $params = [
            'login'  => config('sms_center.login'),
            'psw'    => config('sms_center.password'),
            'phones' => $phoneNumber,
            'mes'    => 'Код регистрации: ' . $smsCode
        ];

        try {
            $response = $client->request('GET', config('sms_center.base_uri'), [
                'query' => $params,
            ]);

            return $response->getBody()->getContents();
        } catch (\Throwable $e) {
            return $e->getMessage();
        }
    }
}
