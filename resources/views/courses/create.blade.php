@extends('layouts.app')

@section('content')
    <h2>Tambah Kursus Baru</h2>

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

    <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <x-input label="Nama Kursus" name="CourseName" required />
        <div class="mb-3">
            <label for="CourseDescription" class="form-label">Deskripsi Kursus</label>
            <textarea name="CourseDescription" class="form-control" id="CourseDescription" rows="4">{{ old('CourseDescription') }}</textarea>
        </div>
        <x-input label="Gambar Kursus" name="image" type="file" />
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
        <a href="{{ route('courses.index') }}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Kembali</a>
    </form>
@endsection
