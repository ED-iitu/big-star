<?php
namespace App;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class Currency
{
    public static function converter()
    {
        return Cache::remember('currency_data_v2', 10000, function () {
            $response = Http::get('https://v6.exchangerate-api.com/v6/cf52beb06094c2299899d963/latest/KZT')->json();

            $kzt = $response['conversion_rates']['KZT'];
            $usd = $response['conversion_rates']['USD'];
            $rub = $response['conversion_rates']['RUB'];
            // Ваши данные, которые будут сохранены в кеше, если они не существуют
            return [
                'KZT' => $kzt,
                'USD' => $usd,
                'RUB' => $rub
            ];
        });
    }
}
