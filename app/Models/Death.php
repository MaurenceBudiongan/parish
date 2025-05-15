<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Death extends Model
{
        protected $fillable = [
        'death_id',
        'deceased_name',
        'residence',
        'age',
        'cause',
        'death_time',
        'place',
        'burial_time',
        'guardian',
        'priest',
        'day',
        'month',
        'year',
        'rectory',
    ];
}
