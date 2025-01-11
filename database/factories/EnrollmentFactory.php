<?php

namespace Database\Factories;

use App\Models\Enrollment;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class EnrollmentFactory extends Factory
{
    protected $model = Enrollment::class;

    public function definition()
    {
        return [
            'StudentID' => Student::factory(),
            'CourseID' => Course::factory(),
            'EnrollmentDate' => $this->faker->date(),
        ];
    }
}
