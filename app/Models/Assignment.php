<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $primaryKey = 'AssignmentID';

    protected $fillable = [
        'CourseID',
        'InstructorID',
        'AssignmentName',
        'DueDate',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class, 'CourseID', 'CourseID');
    }

    public function instructor()
    {
        return $this->belongsTo(Instructor::class, 'InstructorID', 'InstructorID');
    }
}
