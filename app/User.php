<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table ='users';
    protected $primaryKey ='usr_id';

    protected $fillable = [
        'usr_password','usr_username',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'usr_password',
    ];

    public function stockin()
    {
        return $this->hasMany('App\Stockin','usr_id');
    }
    public function stockout()
    {
        return $this->hasMany('App\Stockout','usr_id');
    }



}
