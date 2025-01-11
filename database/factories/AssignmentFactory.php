<?php

namespace Database\Factories;

use App\Models\Assignment;
use App\Models\Course;
use App\Models\Instructor;
use Illuminate\Database\Eloquent\Factories\Factory;

class AssignmentFactory extends Factory
{
    protected $model = Assignment::class;

    public function definition()
    {
        return [
            'CourseID' => Course::factory(),
            'InstructorID' => Instructor::factory(),
            'AssignmentName' => $this->faker->sentence(3),
            'DueDate' => $this->faker->dateTimeBetween('+1 week', '+1 month')->format('Y-m-d'),
        ];
    }
}
