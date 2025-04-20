<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeathCertificate extends Model
{
    protected $fillable = [
        'full_name', 'sex', 'birth_date', 'age', 'birth_place',
        'civil_status', 'address', 'death_date', 'place_of_death',
        'cause_of_death', 'burial_date', 'burial_place', 'officiant'
    ];
    
}
