<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Parishioner extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname',
        'dateofbirth',
        'gender',
        'contactnumber',
        'civil_status',
        'image',
        'street',
        'barangay',
        'city',
        'province',
        'zipcode',
        'baptized',
        'baptism_date',
        'baptism_church',
        'confirmed',
        'status',
    ];



    public function isNew()
    {
        return $this->status === 'new' && $this->created_at->gt(now()->subDay());
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeInactive($query)
    {
        return $query->where('status', 'inactive');
    }

    public function scopeNew($query)
    {
        return $query->where('status', 'new')->where('created_at', '>=', now()->subDay());
    }

    public static function promoteNewToActive()
    {
        return static::where('status', 'new')
            ->where('created_at', '<', now()->subDay())
            ->update(['status' => 'active']);
    }
}
