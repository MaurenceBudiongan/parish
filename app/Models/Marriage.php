<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Marriage extends Model
{
     protected $fillable = [
        'marriage_id',
        'groom_name',
        'groom_fathername',
        'bride_name',
        'bride_fathername',
        'date',
        'priest',
        'first_witnessed',
        'second_witnessed',
        'third_witnessed',
        'fourth_witnessed',
        'fifth_witnessed',
        'sixth_witnessed',
        'seventh_witnessed',
        'eighth_witnessed',
        'place_issuance',
        'day',
        'month',
        'year',
    ];
}
