@extends('layouts.app')

@section('content')
    <h1>Detail HR</h1>

    @if ($hr)
        <p><strong>Nama:</strong> {{ $hr->nama }}</p>
        <p><strong>Jabatan:</strong> {{ $hr->jabatan }}</p>

        <a href="{{ route('hr.edit', $hr->id) }}" class="btn btn-primary">Edit</a>
        <a href="{{ route('hr.confirmDelete', $hr->id) }}" class="btn btn-danger">Hapus</a>
    @else
        <p class="text-danger">Data HR tidak ditemukan.</p>
    @endif

    <a href="{{ route('hr.index') }}" class="btn btn-secondary mt-3">← Kembali ke daftar</a>
@endsection
