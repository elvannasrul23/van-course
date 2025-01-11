@extends('layouts.app')

@section('content')
    <h2>Detail Mahasiswa</h2>

    <div class="card">
        <div class="card-header">
            {{ $student->FirstName }} {{ $student->LastName }}
        </div>
        <div class="card-body">
            @if($student->image)
                <img src="{{ asset('storage/images/' . $student->image) }}" alt="Gambar Mahasiswa" class="img-thumbnail mb-3" width="150" height="150">
            @else
                <img src="{{ asset('images/student-placeholder.png') }}" alt="Gambar Mahasiswa" class="img-thumbnail mb-3" width="150" height="150">
            @endif
            <p><strong>Email:</strong> {{ $student->Email }}</p>
            <p><strong>Nomor Telepon:</strong> {{ $student->PhoneNumber }}</p>
            <p><strong>Daftar Kursus:</strong></p>
            <ul>
                @foreach($student->courses as $course)
                    <li>{{ $course->CourseName }} ({{ $course->pivot->EnrollmentDate }})</li>
                @endforeach
            </ul>
        </div>
    </div>

    <a href="{{ route('students.index') }}" class="btn btn-secondary mt-3"><i class="fa fa-arrow-left"></i> Kembali</a>
@endsection
