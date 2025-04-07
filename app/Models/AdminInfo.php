<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminInfo extends Model
{
    use HasFactory;
    protected $table = 'admin_info';
    protected $fillable = ['name', 'email', 'password'];
}
