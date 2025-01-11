@extends('layouts.app')

@section('content')
    <h2>Detail Tugas</h2>

    <div class="card">
        <div class="card-header">
            {{ $assignment->AssignmentName }}
        </div>
        <div class="card-body">
            <p><strong>Kursus:</strong> {{ $assignment->course->CourseName }}</p>
            <p><strong>Instruktur:</strong> {{ $assignment->instructor->FirstName }} {{ $assignment->instructor->LastName }}</p>
            <p><strong>Due Date:</strong> {{ $assignment->DueDate }}</p>
        </div>
    </div>

    <a href="{{ route('assignments.index') }}" class="btn btn-secondary mt-3"><i class="fa fa-arrow-left"></i> Kembali</a>
@endsection
