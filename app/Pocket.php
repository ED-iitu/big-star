<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Pocket extends Model
{
    use Translatable;

    protected $translatable = ['title', 'description'];

    protected $fillable = [
        'title',
        'description',
        'price'
    ];
}
