<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAuser extends Model
{
    use HasFactory;
    protected $table = 'fauser';
    protected $fillable = ['fullname', 'email', 'password'];
}
