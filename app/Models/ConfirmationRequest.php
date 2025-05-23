<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfirmationRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'confirmationrequest_id',
        'requester',
        'confirmedName',
        'dob',
        'confirmationDate',
        'confirmationPlace',
        'parentsNames',
        'sponsorName',
        'reason',
        'contact',
        'relationship',
        'idProof',
        'status',
        
    ];
}
