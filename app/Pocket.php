<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Pocket extends Model
{
    use Translatable;

    protected $translatable = ['title', 'description', 'tag'];

    protected $fillable = [
        'title',
        'description',
        'tag',
        'price',
        'percent',
    ];

    public static function getAll()
    {
        return Pocket::all();
    }

}
