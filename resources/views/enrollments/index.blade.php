@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h2>Daftar Pendaftaran</h2>
        <a href="{{ route('enrollments.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Pendaftaran</a>
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
                <th>Mahasiswa</th>
                <th>Kursus</th>
                <th>Tanggal Pendaftaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($enrollments as $enrollment)
                <tr>
                    <td>{{ $enrollment->EnrollmentID }}</td>
                    <td>{{ $enrollment->student->FirstName }} {{ $enrollment->student->LastName }}</td>
                    <td>{{ $enrollment->course->CourseName }}</td>
                    <td>{{ $enrollment->EnrollmentDate }}</td>
                    <td>
                        <a href="{{ route('enrollments.show', $enrollment->EnrollmentID) }}" class="btn btn-info btn-sm">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="{{ route('enrollments.edit', $enrollment->EnrollmentID) }}" class="btn btn-warning btn-sm">
                            <i class="fa fa-edit"></i>
                        </a>
                        <form action="{{ route('enrollments.destroy', $enrollment->EnrollmentID) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus pendaftaran ini?')">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $enrollments->links() }}
@endsection
