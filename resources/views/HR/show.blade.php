@extends('layouts.app')

@section('content')
    @if ($hr)
        <h1>{{ $hr->Nama }}</h1>
        <p><strong>ID:</strong> {{ $hr->ID_HR }}</p>
        <p><strong>Jabatan:</strong> {{ $hr->Jabatan }}</p>

        <a href="{{ route('hr.edit', $hr->ID_HR) }}">✏️ Edit</a> |
        <a href="{{ route('hr.confirmDelete', $hr->ID_HR) }}">🗑️ Hapus</a><br>
    @else
        <p style="color: red;">Data HR tidak ditemukan.</p>
    @endif

    <a href="{{ route('hr.index') }}">← Kembali ke daftar</a>
@endsection