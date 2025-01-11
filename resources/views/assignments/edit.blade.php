@extends('layouts.app')

@section('content')
    <h2>Edit Tugas</h2>

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

    <form action="{{ route('assignments.update', $assignment->AssignmentID) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="CourseID" class="form-label">Kursus</label>
            <select name="CourseID" class="form-select" id="CourseID" required>
                <option value="">-- Pilih Kursus --</option>
                @foreach($courses as $course)
                    <option value="{{ $course->CourseID }}" {{ (old('CourseID', $assignment->CourseID) == $course->CourseID) ? 'selected' : '' }}>
                        {{ $course->CourseName }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="InstructorID" class="form-label">Instruktur</label>
            <select name="InstructorID" class="form-select" id="InstructorID" required>
                <option value="">-- Pilih Instruktur --</option>
                @foreach($instructors as $instructor)
                    <option value="{{ $instructor->InstructorID }}" {{ (old('InstructorID', $assignment->InstructorID) == $instructor->InstructorID) ? 'selected' : '' }}>
                        {{ $instructor->FirstName }} {{ $instructor->LastName }}
                    </option>
                @endforeach
            </select>
        </div>
        <x-input label="Nama Tugas" name="AssignmentName" required :value="$assignment->AssignmentName" />
        <div class="mb-3">
            <label for="DueDate" class="form-label">Due Date</label>
            <input type="date" name="DueDate" class="form-control" id="DueDate" value="{{ old('DueDate', $assignment->DueDate) }}" required>
        </div>
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Perbarui</button>
        <a href="{{ route('assignments.index') }}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Kembali</a>
    </form>
@endsection
