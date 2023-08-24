<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public const STATUS_CREATED = 0;
    public const STATUS_SUCCESS = 1;
    public const STATUS_FAILURE = 2;
    public const TYPE_PURCHASE = 1;
    public const TYPE_WITHDRAW = 2;

    public const TYPE_REGISTERED = 3;

    public const TYPE_MONTHLY_PURCHASE = 4;

    protected $fillable = [
        'user_id',
        'pocket_id',
        'type',
        'status',
        'sum'
    ];

    public static function getStatusName($status) {
        switch ($status) {
            case 0:
                return 'В обработке';
            case 1:
                return "Успешно";
            case 2:
                return "Ошибка";
            default:
                return "В обработке";
        }
    }

    public static function getTypeName($type)
    {
        switch ($type) {
            case 1:
                return 'Покупка';
            case 2:
                return "Вывод";
            case 3:
                return "Оплата за приглашения";
            case 4:
                return "Начисление процентов";
            default:
                return "Покупка";
        }
    }
}
