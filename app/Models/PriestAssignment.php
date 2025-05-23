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
        return $this->belongsTo(Priest::class, 'priest_id', 'priest_id');
        // 'priest_id' is the foreign key on this table,
        // 'priest_id' is the primary key on the priests table
    }
}

