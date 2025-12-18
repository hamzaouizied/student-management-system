<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'date_of_birth',
        'phone',
        'address'
    ];

    protected $dates = ['date_of_birth'];

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_student')
            ->withPivot('enrolled_at')
            ->withTimestamps();
    }

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }
}
