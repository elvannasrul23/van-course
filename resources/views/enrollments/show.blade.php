@extends('layouts.app')

@section('content')
    <h2>Detail Pendaftaran</h2>

    <div class="card">
        <div class="card-header">
            Pendaftaran ID: {{ $enrollment->EnrollmentID }}
        </div>
        <div class="card-body">
            <p><strong>Mahasiswa:</strong> {{ $enrollment->student->FirstName }} {{ $enrollment->student->LastName }}</p>
            <p><strong>Kursus:</strong> {{ $enrollment->course->CourseName }}</p>
            <p><strong>Tanggal Pendaftaran:</strong> {{ $enrollment->EnrollmentDate }}</p>
        </div>
    </div>

    <a href="{{ route('enrollments.index') }}" class="btn btn-secondary mt-3"><i class="fa fa-arrow-left"></i> Kembali</a>
@endsection
