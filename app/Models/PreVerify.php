<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreVerify extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'is_email_verified',
    ];
}
