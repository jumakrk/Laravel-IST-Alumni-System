<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    protected $fillable = [
        'job_id',
        'user_id',
        'name',
        'email',
        'phone',
        'cover_letter',
        'cv_path',
    ];
}

