<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    use \Illuminate\Notifications\Notifiable;

    protected $fillable = ['user_id', 'job_id', 'type', 'is_read'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeUnread($query)
    {
        return $query->where('is_read', false);
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
