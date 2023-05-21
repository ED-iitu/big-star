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

    protected $fillable = [
        'user_id',
        'pocket_id',
        'type',
        'status',
        'sum'
    ];
}
