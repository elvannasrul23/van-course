@extends('layouts.app')

@section('content')
    <h2>Edit Instruktur</h2>

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

    <form action="{{ route('instructors.update', $instructor->InstructorID) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <x-input label="Nama Depan" name="FirstName" required :value="$instructor->FirstName" />
        <x-input label="Nama Belakang" name="LastName" required :value="$instructor->LastName" />
        <x-input label="Email" name="Email" type="email" required :value="$instructor->Email" />
        <div class="mb-3">
            <label for="image" class="form-label">Gambar Instruktur</label>
            @if($instructor->image)
                <div class="mb-2">
                    <img src="{{ asset('storage/images/' . $instructor->image) }}" alt="Gambar Instruktur" width="100" height="100">
                </div>
            @endif
            <input type="file" name="image" class="form-control" id="image" accept="image/*">
        </div>
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Perbarui</button>
        <a href="{{ route('instructors.index') }}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Kembali</a>
    </form>
@endsection
