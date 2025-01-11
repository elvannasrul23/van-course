<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignmentsTable extends Migration
{
    public function up()
    {
        Schema::create('assignments', function (Blueprint $table) {
            $table->id('AssignmentID');
            $table->foreignId('CourseID')->constrained('courses', 'CourseID')->onDelete('cascade');
            $table->foreignId('InstructorID')->constrained('instructors', 'InstructorID')->onDelete('cascade');
            $table->string('AssignmentName');
            $table->date('DueDate');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('assignments');
    }
}
