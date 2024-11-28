<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job_Application extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'portfolio',
        'cv',
        'cover_letter',
        'user_id',
        'job_id',
    ];

    public function job() {
        return $this->belongsTo(Job::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
}