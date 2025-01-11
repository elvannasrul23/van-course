@extends('layouts.app')

@section('content')
    <h2>Detail Instruktur</h2>

    <div class="card">
        <div class="card-header">
            {{ $instructor->FirstName }} {{ $instructor->LastName }}
        </div>
        <div class="card-body">
            @if($instructor->image)
                <img src="{{ asset('storage/images/' . $instructor->image) }}" alt="Gambar Instruktur" class="img-thumbnail mb-3" width="150" height="150">
            @else
                <img src="{{ asset('images/instructor-placeholder.png') }}" alt="Gambar Instruktur" class="img-thumbnail mb-3" width="150" height="150">
            @endif
            <p><strong>Email:</strong> {{ $instructor->Email }}</p>
            <p><strong>Daftar Tugas:</strong></p>
            <ul>
                @foreach($instructor->assignments as $assignment)
                    <li>{{ $assignment->AssignmentName }} ({{ $assignment->DueDate }})</li>
                @endforeach
            </ul>
        </div>
    </div>

    <a href="{{ route('instructors.index') }}" class="btn btn-secondary mt-3"><i class="fa fa-arrow-left"></i> Kembali</a>
@endsection
