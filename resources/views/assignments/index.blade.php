@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h2>Daftar Tugas</h2>
        <a href="{{ route('assignments.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Tugas</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Kursus</th>
                <th>Instruktur</th>
                <th>Nama Tugas</th>
                <th>Due Date</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($assignments as $assignment)
                <tr>
                    <td>{{ $assignment->AssignmentID }}</td>
                    <td>{{ $assignment->course->CourseName }}</td>
                    <td>{{ $assignment->instructor->FirstName }} {{ $assignment->instructor->LastName }}</td>
                    <td>{{ $assignment->AssignmentName }}</td>
                    <td>{{ $assignment->DueDate }}</td>
                    <td>
                        <a href="{{ route('assignments.show', $assignment->AssignmentID) }}" class="btn btn-info btn-sm">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="{{ route('assignments.edit', $assignment->AssignmentID) }}" class="btn btn-warning btn-sm">
                            <i class="fa fa-edit"></i>
                        </a>
                        <form action="{{ route('assignments.destroy', $assignment->AssignmentID) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus tugas ini?')">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $assignments->links() }}
@endsection
