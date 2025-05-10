<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriestAssignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'priest_id',
        'assignment_type',
        'assignment_title',
        'location',
        'start_date',
        'end_date',
        'status',
        'assigned_by',
        'remarks',
    ];

    public function priest()
    {
        return $this->belongsTo(Priest::class);
    }
}

