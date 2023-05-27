<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
class WithdrawRequest extends Model
{
    protected $fillable = [
        'user_id', 'card_no', 'phone', 'amount'
    ];

    protected $table = 'withdraw_requests';
}
