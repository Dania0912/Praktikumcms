@extends('layouts.app')

@section('title', 'Daftar Karyawan')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Daftar Karyawan</h2>
        <a href="{{ route('karyawan.create') }}" class="btn btn-success">
            <i class="bi bi-person-plus me-1"></i> Tambah Karyawan
        </a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <ul class="list-group">
                @forelse($karyawan as $k)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a href="{{ route('karyawan.show', $k->id) }}" class="text-decoration-none">{{ $k->nama }}</a>
                        <div>
                            <!-- You can add more actions here -->
                            <a href="{{ route('karyawan.edit', $k->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <a href="{{ route('karyawan.show', $k->id) }}" class="btn btn-info btn-sm">Detail</a>
                        </div>
                    </li>
                @empty
                    <li class="list-group-item text-center text-muted">Tidak ada karyawan.</li>
                @endforelse
            </ul>
        </div>
    </div>
@endsection
