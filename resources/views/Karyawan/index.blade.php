@extends('layouts.app')

@section('title', 'Daftar Karyawan')

@section('content')
    {{-- Notifikasi sukses --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    {{-- Notifikasi error --}}
    @elseif(session('errors'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('errors') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Daftar Karyawan</h2>
        <a href="{{ route('karyawan.create') }}" class="btn btn-success">
            <i class="bi bi-person-plus me-1"></i> Tambah Karyawan
        </a>
    </div>

    {{-- Form Pencarian --}}
    <form action="{{ route('karyawan.index') }}" method="GET" class="mb-4 d-flex" style="max-width: 400px;">
        <input type="text" name="search" class="form-control me-2" placeholder="Cari nama karyawan..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary">Cari</button>
    </form>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <ul class="list-group">
                @forelse($karyawan as $k)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <strong>{{ $k->nama }}</strong><br>
                            <small class="text-muted">{{ $k->jabatan }}</small>
                        </div>
                        <div>
                            <a href="{{ route('karyawan.edit', $k->id) }}" class="btn btn-warning btn-sm me-1">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                            <a href="{{ route('karyawan.show', $k->id) }}" class="btn btn-info btn-sm me-1">
                                <i class="bi bi-eye"></i> Detail
                            </a>
                            <a href="{{ route('karyawan.delete', $k->id) }}" class="btn btn-danger btn-sm">
                                <i class="bi bi-trash"></i> Hapus
                            </a>
                        </div>
                    </li>
                @empty
                    <li class="list-group-item text-center text-muted">Tidak ada karyawan.</li>
                @endforelse
            </ul>
        </div>
    </div>
@endsection
