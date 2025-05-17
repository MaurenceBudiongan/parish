<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaptismRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'baptismrequest_id',
        'requester',
        'childName',
        'dob',
        'baptismDate',
        'baptismPlace',
        'parentsNames',
        'purpose',
        'contact',
        'relationship',
        'idProof',
    ];
}
