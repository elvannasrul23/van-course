@extends('layouts.app')

@section('content')
    <h2>Edit Kursus</h2>

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

    <form action="{{ route('courses.update', $course->CourseID) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <x-input label="Nama Kursus" name="CourseName" required :value="$course->CourseName" />
        <div class="mb-3">
            <label for="CourseDescription" class="form-label">Deskripsi Kursus</label>
            <textarea name="CourseDescription" class="form-control" id="CourseDescription" rows="4">{{ old('CourseDescription', $course->CourseDescription) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Gambar Kursus</label>
            @if($course->image)
                <div class="mb-2">
                    <img src="{{ asset('storage/images/' . $course->image) }}" alt="Gambar Kursus" width="100" height="100">
                </div>
            @endif
            <input type="file" name="image" class="form-control" id="image" accept="image/*">
        </div>
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Perbarui</button>
        <a href="{{ route('courses.index') }}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Kembali</a>
    </form>
@endsection
