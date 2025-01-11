@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h2>Daftar Kursus</h2>
        <a href="{{ route('courses.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Kursus</a>
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
                <th>Gambar</th>
                <th>Nama Kursus</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($courses as $course)
                <tr>
                    <td>{{ $course->CourseID }}</td>
                    <td>
                        @if($course->image)
                            <img src="{{ asset('storage/images/' . $course->image) }}" alt="Gambar Kursus" width="50" height="50">
                        @else
                            <img src="{{ asset('images/course-placeholder.png') }}" alt="Gambar Kursus" width="50" height="50">
                        @endif
                    </td>
                    <td>{{ $course->CourseName }}</td>
                    <td>{{ Str::limit($course->CourseDescription, 50) }}</td>
                    <td>
                        <a href="{{ route('courses.show', $course->CourseID) }}" class="btn btn-info btn-sm">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="{{ route('courses.edit', $course->CourseID) }}" class="btn btn-warning btn-sm">
                            <i class="fa fa-edit"></i>
                        </a>
                        <form action="{{ route('courses.destroy', $course->CourseID) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus kursus ini?')">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $courses->links() }}
@endsection
