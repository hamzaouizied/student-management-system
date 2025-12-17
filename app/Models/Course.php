<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_ref',
        'title',
        'description',
        'credits',
        'instructor',
    ];

    public function students()
    {
        return $this->belongsToMany(Course::class)
            ->withPivot('enrolled_at')
            ->withTimestamps();
    }

}
