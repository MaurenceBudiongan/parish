<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Priest extends Model
{
    use HasFactory;

    protected $fillable = [
        'priest_id',
        'first_name',
        'last_name',
        'middle_name',
        'suffix',
        'email',
        'phone_number',
        'address',
        'date_of_birth',
        'ordination_date',
        'assigned_parish',
        'position',
        'profile_photo',
        'status'
    ];
}


