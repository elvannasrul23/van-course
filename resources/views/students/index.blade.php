@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h2>Daftar Mahasiswa</h2>
        <a href="{{ route('students.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Mahasiswa</a>
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
                <th>Nomor Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{ $student->StudentID }}</td>
                    <td>
                        @if($student->image)
                            <img src="{{ asset('storage/images/' . $student->image) }}" alt="Gambar Mahasiswa" width="50" height="50">
                        @else
                            <img src="{{ asset('images/student-placeholder.png') }}" alt="Gambar Mahasiswa" width="50" height="50">
                        @endif
                    </td>
                    <td>{{ $student->FirstName }}</td>
                    <td>{{ $student->LastName }}</td>
                    <td>{{ $student->Email }}</td>
                    <td>{{ $student->PhoneNumber }}</td>
                    <td>
                        <a href="{{ route('students.show', $student->StudentID) }}" class="btn btn-info btn-sm">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="{{ route('students.edit', $student->StudentID) }}" class="btn btn-warning btn-sm">
                            <i class="fa fa-edit"></i>
                        </a>
                        <form action="{{ route('students.destroy', $student->StudentID) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus mahasiswa ini?')">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $students->links() }}
@endsection
