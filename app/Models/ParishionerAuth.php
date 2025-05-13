<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // use this instead of Model
use Illuminate\Notifications\Notifiable;

class ParishionerAuth extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'fullname', 'username', 'email', 'password',
    ];

    protected $hidden = [
        'password',
    ];
}

