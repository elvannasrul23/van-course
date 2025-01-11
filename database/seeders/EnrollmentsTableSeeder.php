<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Enrollment;

class EnrollmentsTableSeeder extends Seeder
{
    public function run()
    {
        Enrollment::factory()->count(100)->create();
    }
}
