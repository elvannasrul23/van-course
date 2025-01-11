<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Assignment;

class AssignmentsTableSeeder extends Seeder
{
    public function run()
    {
        Assignment::factory()->count(50)->create();
    }
}
