<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;
class MonthlyPurchase extends Model
{
    use Translatable;

    public const STATUS_CREATED = 1;
    public const STATUS_FILL = 2;
    public const STATUS_FINISHED = 3;

    protected $translatable = ['title'];

    protected $fillable = [
        'title', 'amount', 'status'
    ];
}
