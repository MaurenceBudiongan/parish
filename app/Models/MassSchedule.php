<?php

// app/Models/MassSchedule.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MassSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'service_type', 'date',
        'start_time', 'end_time', 'location',
        'status', 'notes'
    ];

}
