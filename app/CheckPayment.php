<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class CheckPayment extends Model
{
    public const STATUS_PENDING = 0;
    public const STATUS_SUCCESS = 1;
    public const STATUS_DECLINED = 2;

    protected $fillable = [
        'user_id',
        'pocket_id',
        'registered_from',
        'presenter',
        'price',
        'currency',
        'check',
        'status'
    ];
}
