<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Baptismal extends Model
{

    protected $fillable = [
        'baptismal_id',
        'child_name',
        'date_birth',
        'place',
        'father_name',
        'mother_name',
        'parent_residence',
        'date_baptism',
        'minister',
        'sponsor',
        'purpose',
    ];
}
