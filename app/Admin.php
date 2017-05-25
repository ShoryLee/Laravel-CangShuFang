<?php

namespace App;

//use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
//    protected $table = 'admins';
//    protected $primaryKey = 'id';

    protected $fillable = [
        'name', 'thumb', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
