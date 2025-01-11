<!-- resources/views/welcome.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="jumbotron text-center">
        <h1>Selamat Datang di Kursus Online Elvan</h1>
        <p>Pilih salah satu opsi di bawah ini untuk memulai:</p>
        <div class="d-flex justify-content-center">
            <a href="{{ route('students.index') }}" class="btn btn-primary m-2"><i class="fa fa-user"></i> Mahasiswa</a>
            <a href="{{ route('courses.index') }}" class="btn btn-success m-2"><i class="fa fa-book"></i> Kursus</a>
            <a href="{{ route('instructors.index') }}" class="btn btn-warning m-2"><i class="fa fa-chalkboard-teacher"></i> Instruktur</a>
            <a href="{{ route('enrollments.index') }}" class="btn btn-info m-2"><i class="fa fa-clipboard-list"></i> Pendaftaran</a>
            <a href="{{ route('assignments.index') }}" class="btn btn-secondary m-2"><i class="fa fa-tasks"></i> Tugas</a>
        </div>
    </div>
@endsection
