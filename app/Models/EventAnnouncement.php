<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventAnnouncement extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'event_date',
        'start_time', 'end_time', 'location',
        'audience', 'status', 'announced_by'
    ];
}
