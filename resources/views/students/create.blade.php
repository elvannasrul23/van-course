@extends('layouts.app')

@section('content')
    <h2>Tambah Mahasiswa Baru</h2>

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

    <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <x-input label="Nama Depan" name="FirstName" required />
        <x-input label="Nama Belakang" name="LastName" required />
        <x-input label="Email" name="Email" type="email" required />
        <x-input label="Nomor Telepon" name="PhoneNumber" />
        <x-input label="Gambar Mahasiswa" name="image" type="file" />
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
        <a href="{{ route('students.index') }}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Kembali</a>
    </form>
@endsection
