@extends('layouts.app')

@section('title', 'Daftar HR')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Daftar HR</h2>
        <a href="{{ route('hr.create') }}" class="btn btn-success">
            <i class="bi bi-person-plus me-1"></i> Tambah HR
        </a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <ul class="list-group">
                @forelse($hrs as $hr)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a href="{{ route('hr.show', $hr->id) }}" class="text-decoration-none">
                            {{ $hr->nama }} - {{ $hr->jabatan }}
                        </a>
                        <div>
                            <a href="{{ route('hr.edit', $hr->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <a href="{{ route('hr.show', $hr->id) }}" class="btn btn-info btn-sm">Detail</a>
                        </div>
                    </li>
                @empty
                    <li class="list-group-item text-center text-muted">Tidak ada data HR.</li>
                @endforelse
            </ul>
        </div>
    </div>
@endsection
