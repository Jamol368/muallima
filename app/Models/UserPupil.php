<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPupil extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_info_id',
        'school_id',
        'school_grade',
    ];
}
