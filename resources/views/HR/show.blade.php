@extends('layouts.app')

@section('title', 'Detail HR')

@section('content')
<div class="container">

    {{-- Notifikasi sukses --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    @elseif (session('errors'))
        <div class="alert alert-error alert-dismissible fade show" role="alert">
            {{ session('errors') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Detail HR</h4>
        </div>
        <div class="card-body">
            @if ($hr)
                <div class="mb-4">
                    <p><strong>Nama:</strong> {{ $hr->nama }}</p>
                    <p><strong>Jabatan:</strong> {{ $hr->jabatan }}</p>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('hr.edit', $hr->id) }}" class="btn btn-warning">Edit</a>
                    <a href="{{ route('hr.confirmDelete', $hr->id) }}" class="btn btn-danger">Hapus</a>
                    <a href="{{ route('hr.index') }}" class="btn btn-secondary">← Kembali ke daftar</a>
                </div>
            @else
                <p class="text-danger">Data HR tidak ditemukan.</p>
                <a href="{{ route('hr.index') }}" class="btn btn-secondary mt-3">← Kembali ke daftar</a>
            @endif
        </div>
    </div>
</div>
@endsection
