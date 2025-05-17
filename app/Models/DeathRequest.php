<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeathRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'deathrequest_id',
        'requester',
        'fullName',
        'deathDate',
        'deathPlace',
        'dobOrAge',
        'parentsNames',
        'spouseName',
        'purpose',
        'contact',
        'relationship',
        'idProof',
    ];
}

