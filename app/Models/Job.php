<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Job extends Model
{
    use HasFactory;
    use HasSlug;


    protected $fillable = [
        'job_name',
        'employment_type',
        'salary_min',
        'salary_max',
        'location',
        'description',
        'requirements',
        'employer_id',
    ];

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function job_applications()
    {
        return $this->hasMany(Job_Application::class);
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
        ->generateSlugsFrom(function ($model) {
            return $model->job_name . '-' .  now()->format('Y-m-d-H-i');
        })->saveSlugsTo('slug');
    }

    public function getRouteKeyName()
    {
        return'slug';
    }
}
