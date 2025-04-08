<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'lastname',
        'dateofbirth',
        'streetaddress',
        'city',
        'state',
        'zip',
        'email',
        'phonenumber',
        'documenttype',
        'reason',
        'reference_code',
        'status'
    ];
}

