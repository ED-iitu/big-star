<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Pocket extends Model
{
    protected $fillable = [
        'title',
        'description',
        'price'
    ];
}
