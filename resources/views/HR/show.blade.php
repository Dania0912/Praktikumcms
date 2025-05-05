@extends('layouts.app')

@section('content')
    <h1>Detail HR</h1>

    @if ($hr)
        <p><strong>ID HR:</strong> {{ $hr->ID_HR }}</p>
        <p><strong>Nama:</strong> {{ $hr->Nama }}</p>
        <p><strong>Jabatan:</strong> {{ $hr->Jabatan }}</p>

        <a href="{{ route('hr.edit', $hr->ID_HR) }}" class="btn btn-primary">Edit</a>
        <a href="{{ route('hr.confirmDelete', $hr->ID_HR) }}" class="btn btn-danger">Hapus</a>
    @else
        <p class="text-danger">Data HR tidak ditemukan.</p>
    @endif

    <a href="{{ route('hr.index') }}" class="btn btn-secondary mt-3">← Kembali ke daftar</a>
@endsection
