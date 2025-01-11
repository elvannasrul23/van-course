<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    use HasFactory;

    protected $primaryKey = 'InstructorID';

    protected $fillable = [
        'FirstName',
        'LastName',
        'Email',
        'image',
    ];

    public function assignments()
    {
        return $this->hasMany(Assignment::class, 'InstructorID', 'InstructorID');
    }
}
