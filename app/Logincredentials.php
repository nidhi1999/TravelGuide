<?php

namespace App;


use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Logincredentials extends Authenticatable
{   use Notifiable;
    //
    protected $fillable = [
        'name', 'email', 'password',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function guide()
    {
        return $this->hasOne('App/Guide');
    }
    public function tourist()
    {
        return $this->hasOne('App/Tourists');
    }
}
