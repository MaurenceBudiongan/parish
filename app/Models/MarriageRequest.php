<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarriageRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'marriagerequest_id',
        'requester',
        'spouse1',
        'spouse2',
        'marriageDate',
        'marriagePlace',
        'officiant',
        'purpose',
        'contact',
        'relationship',
        'idProof',
        'status',
        
    ];
}

