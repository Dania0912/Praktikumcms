@extends('layouts.app')

@section('title', 'Daftar Penggajian')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Daftar Penggajian</h2>
        <a href="{{ route('penggajian.create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle me-1"></i> Tambah Penggajian
        </a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <ul class="list-group">
                @forelse($penggajian as $pg)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a href="{{ route('penggajian.show', $pg->id) }}" class="text-decoration-none">
                            Penggajian #{{ $pg->ID_Penggajian }}
                        </a>
                        <div>
                            <a href="{{ route('penggajian.edit', $pg->ID_Penggajian) }}" class="btn btn-warning btn-sm">Edit</a>
                            <a href="{{ route('penggajian.show', $pg->ID_Penggajian) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('penggajian.delete', $pg->ID_Penggajian) }}" class="btn btn-danger btn-sm">Hapus</a>
                        </div>
                    </li>
                @empty
                    <li class="list-group-item text-center text-muted">Tidak ada data penggajian.</li>
                @endforelse
            </ul>
        </div>
    </div>
@endsection
