<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parishioner extends Model
{
    protected $fillable = [
        'fullname', 'dateofbirth', 'gender', 'contactnumber', 'civil_status', 'image',
        'street', 'barangay', 'city', 'province', 'zipcode',
        'baptized', 'baptism_date', 'baptism_church', 'confirmed'
    ];
    
}
