<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $primaryKey = 'StudentID';

    protected $fillable = [
        'FirstName',
        'LastName',
        'Email',
        'PhoneNumber',
        'image',
    ];

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class, 'StudentID', 'StudentID');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'enrollments', 'StudentID', 'CourseID')
                    ->withPivot('EnrollmentDate')
                    ->withTimestamps();
    }
}
