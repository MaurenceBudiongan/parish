<?php

// app/Models/Staff.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $fillable = [
        'staff_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'position',
        'department',
        'address',
        'status',
        'photo', // ✅ Add this
        'date_hired',
    ];
}
