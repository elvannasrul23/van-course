@extends('layouts.app')

@section('content')
    <h2>Detail Kursus</h2>

    <div class="card">
        <div class="card-header">
            {{ $course->CourseName }}
        </div>
        <div class="card-body">
            @if($course->image)
                <img src="{{ asset('storage/images/' . $course->image) }}" alt="Gambar Kursus" class="img-thumbnail mb-3" width="150" height="150">
            @else
                <img src="{{ asset('images/course-placeholder.png') }}" alt="Gambar Kursus" class="img-thumbnail mb-3" width="150" height="150">
            @endif
            <p><strong>Deskripsi:</strong> {{ $course->CourseDescription }}</p>
            <p><strong>Daftar Mahasiswa:</strong></p>
            <ul>
                @foreach($course->students as $student)
                    <li>{{ $student->FirstName }} {{ $student->LastName }} ({{ $student->pivot->EnrollmentDate }})</li>
                @endforeach
            </ul>
            <p><strong>Daftar Tugas:</strong></p>
            <ul>
                @foreach($course->assignments as $assignment)
                    <li>{{ $assignment->AssignmentName }} (Due: {{ $assignment->DueDate }})</li>
                @endforeach
            </ul>
        </div>
    </div>

    <a href="{{ route('courses.index') }}" class="btn btn-secondary mt-3"><i class="fa fa-arrow-left"></i> Kembali</a>
@endsection
