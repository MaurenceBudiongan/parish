<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id', 'amount', 'donation_type', 'donation_date',
        'payment_method', 'reference_no', 'remarks'
    ];

    public function member()
    {
        return $this->belongsTo(Parishioner::class, 'member_id');
    }
}
