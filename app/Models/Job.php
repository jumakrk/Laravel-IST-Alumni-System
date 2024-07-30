<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'location',
        'type',
        'description',
        'qualifications',
        'application_deadline',
        'posted_at',
        'user_id', // Added user_id
    ];
    

    protected $casts = [
        'posted_at' => 'datetime', // Cast to a Carbon date object
        'application_deadline' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    

    public $timestamps = false; // Disable default timestamps
}
