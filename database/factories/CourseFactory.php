<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    protected $model = Course::class;

    public function definition()
    {
        return [
            'CourseName' => $this->faker->words(3, true),
            'CourseDescription' => $this->faker->paragraph,
            'image' => 'course-placeholder.png', // Nama file gambar placeholder
        ];
    }
}
