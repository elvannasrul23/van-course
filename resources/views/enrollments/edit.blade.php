@extends('layouts.app')

@section('content')
    <h2>Edit Pendaftaran</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Oops!</strong> Terjadi kesalahan saat input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('enrollments.update', $enrollment->EnrollmentID) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="StudentID" class="form-label">Mahasiswa</label>
            <select name="StudentID" class="form-select" id="StudentID" required>
                <option value="">-- Pilih Mahasiswa --</option>
                @foreach($students as $student)
                    <option value="{{ $student->StudentID }}" {{ (old('StudentID', $enrollment->StudentID) == $student->StudentID) ? 'selected' : '' }}>
                        {{ $student->FirstName }} {{ $student->LastName }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="CourseID" class="form-label">Kursus</label>
            <select name="CourseID" class="form-select" id="CourseID" required>
                <option value="">-- Pilih Kursus --</option>
                @foreach($courses as $course)
                    <option value="{{ $course->CourseID }}" {{ (old('CourseID', $enrollment->CourseID) == $course->CourseID) ? 'selected' : '' }}>
                        {{ $course->CourseName }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="EnrollmentDate" class="form-label">Tanggal Pendaftaran</label>
            <input type="date" name="EnrollmentDate" class="form-control" id="EnrollmentDate" value="{{ old('EnrollmentDate', $enrollment->EnrollmentDate) }}" required>
        </div>
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Perbarui</button>
        <a href="{{ route('enrollments.index') }}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Kembali</a>
    </form>
@endsection
