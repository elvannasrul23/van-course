<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $primaryKey = 'CourseID';

    protected $fillable = [
        'CourseName',
        'CourseDescription',
        'image',
    ];

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class, 'CourseID', 'CourseID');
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'enrollments', 'CourseID', 'StudentID')
                    ->withPivot('EnrollmentDate')
                    ->withTimestamps();
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class, 'CourseID', 'CourseID');
    }
}
