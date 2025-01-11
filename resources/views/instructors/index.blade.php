@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h2>Daftar Instruktur</h2>
        <a href="{{ route('instructors.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Instruktur</a>
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
                <th>Nama Depan</th>
                <th>Nama Belakang</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($instructors as $instructor)
                <tr>
                    <td>{{ $instructor->InstructorID }}</td>
                    <td>
                        @if($instructor->image)
                            <img src="{{ asset('storage/images/' . $instructor->image) }}" alt="Gambar Instruktur" width="50" height="50">
                        @else
                            <img src="{{ asset('images/instructor-placeholder.png') }}" alt="Gambar Instruktur" width="50" height="50">
                        @endif
                    </td>
                    <td>{{ $instructor->FirstName }}</td>
                    <td>{{ $instructor->LastName }}</td>
                    <td>{{ $instructor->Email }}</td>
                    <td>
                        <a href="{{ route('instructors.show', $instructor->InstructorID) }}" class="btn btn-info btn-sm">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="{{ route('instructors.edit', $instructor->InstructorID) }}" class="btn btn-warning btn-sm">
                            <i class="fa fa-edit"></i>
                        </a>
                        <form action="{{ route('instructors.destroy', $instructor->InstructorID) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus instruktur ini?')">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $instructors->links() }}
@endsection
