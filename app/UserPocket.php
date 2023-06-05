<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
class UserPocket extends Model
{
    protected $table='user_pockets';

    protected $fillable = [
      'user_id', 'pocket_id'
    ];
}
