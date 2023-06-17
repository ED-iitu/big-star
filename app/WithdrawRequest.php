<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
class WithdrawRequest extends Model
{
    public const STATUS_CREATED = 1;
    public const STATUS_ACCEPTED = 2;
    public const STATUS_CANCELED = 3;

    public const STATUS_SENT = 4;

    protected $fillable = [
        'user_id', 'card_no', 'phone', 'amount', 'status'
    ];

    protected $table = 'withdraw_requests';

    public static function getStatusAsText($status)
    {
        switch ($status) {
            case 1:
                return "Одобрено";
            case 2:
                return "Отказано";
            case 3:
                return "Отправлено";
            default:
                return "В работе";
        }
    }
}
