<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends \TCG\Voyager\Models\User
{
    use Notifiable;

    public const ROLE_ADMIN = 1;
    public const ROLE_USER = 2;
    public const ROLE_PRESENTER = 3;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'sms_code',
        'registered_from',
        'invite_code'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function wallet()
    {
        return $this->hasOne(Wallet::class);
    }

    public static function getAll()
    {
        return User::where('id', '!=', Auth::user()->id)->get();
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public static function getPresenters()
    {
        return User::where('role_id', User::ROLE_PRESENTER)->where('id', '!=', Auth::user()->id)->get();
    }

    public function pockets()
    {
        return $this->belongsToMany(Pocket::class, 'user_pockets');
    }

    public static function getUserById($id)
    {
        $user = self::where('id', $id)->first();

        return $user ?? null;
    }

    public static function getAllPresenters()
    {
        return User::where('role_id', User::ROLE_PRESENTER)->get();
    }
}
