<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Course extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title', 'course_category_id', 'category', 'last_update', 'description',
        'academic_content', 'curriculum', 'image', 'price', 'rating',
        'num_ratings', 'lectures', 'duration', 'skill_level', 'language', 'students',
        'syllabus_url', 'academic_content_url',
        'notes_url','mcq_url'
    ];

    public function courseCategory()
    {
        return $this->belongsTo(CourseCategory::class, 'course_category_id');
    }

    public function getImageUrlAttribute()
    {
        if ($this->image) {
            // Generate the full URL of the image
            return Storage::url($this->image);
        }
    }

   
}
