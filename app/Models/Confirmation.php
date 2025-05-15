<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Confirmation extends Model
{
    protected $fillable = [
        'confirmation_id',
        'child_name',
        'father_name',
        'mother_name',
        'day',
        'month',
        'year',
        'excellency',
        'parish_name',
        'first_sponsor',
        'second_sponsor',
        'purpose',
    ];
}
