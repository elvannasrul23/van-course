<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            StudentsTableSeeder::class,
            CoursesTableSeeder::class,
            InstructorsTableSeeder::class,
            EnrollmentsTableSeeder::class,
            AssignmentsTableSeeder::class,
        ]);
    }
}
