<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    protected $primaryKey = 'EnrollmentID';

    protected $fillable = [
        'StudentID',
        'CourseID',
        'EnrollmentDate',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'StudentID', 'StudentID');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'CourseID', 'CourseID');
    }
}
