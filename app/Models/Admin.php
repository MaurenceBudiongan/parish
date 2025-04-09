<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'adminfullname', 'admin', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}

