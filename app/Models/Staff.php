<?php

// app/Models/Staff.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $fillable = [
        'staff_id', 
        'first_name',
        'last_name',
        'email', 
        'phone', 
        'position', 
        'department',
        'address', 
        'status'
    ];
}
