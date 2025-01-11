<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnrollmentsTable extends Migration
{
    public function up()
    {
        Schema::create('enrollments', function (Blueprint $table) {
            $table->id('EnrollmentID');
            $table->foreignId('StudentID')->constrained('students', 'StudentID')->onDelete('cascade');
            $table->foreignId('CourseID')->constrained('courses', 'CourseID')->onDelete('cascade');
            $table->date('EnrollmentDate');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('enrollments');
    }
}
