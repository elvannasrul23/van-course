@extends('layouts.app')

@section('content')
    <h2>Edit Mahasiswa</h2>

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

    <form action="{{ route('students.update', $student->StudentID) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <x-input label="Nama Depan" name="FirstName" required :value="$student->FirstName" />
        <x-input label="Nama Belakang" name="LastName" required :value="$student->LastName" />
        <x-input label="Email" name="Email" type="email" required :value="$student->Email" />
        <x-input label="Nomor Telepon" name="PhoneNumber" :value="$student->PhoneNumber" />
        <div class="mb-3">
            <label for="image" class="form-label">Gambar Mahasiswa</label>
            @if($student->image)
                <div class="mb-2">
                    <img src="{{ asset('storage/images/' . $student->image) }}" alt="Gambar Mahasiswa" width="100" height="100">
                </div>
            @endif
            <input type="file" name="image" class="form-control" id="image" accept="image/*">
        </div>
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Perbarui</button>
        <a href="{{ route('students.index') }}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Kembali</a>
    </form>
@endsection
