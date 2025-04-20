<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MarriageRecord extends Model
{


    protected $fillable = ['bride', 'groom', 'officiant', 'marriage_date'];
}

