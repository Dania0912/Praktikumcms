@extends('layouts.app')

@section('title', 'Daftar Jadwal Kerja')

@section('content')

    {{-- Notifikasi sukses dan error --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @elseif (session('errors'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('errors') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Daftar Jadwal Kerja</h2>
        <a href="{{ route('jadwalkerja.create') }}" class="btn btn-success">
            <i class="bi bi-calendar-plus me-1"></i> Tambah Jadwal
        </a>
    </div>

    <!-- Form Pencarian -->
    <form action="{{ route('jadwalkerja.index') }}" method="GET" class="mb-4 d-flex" style="max-width: 400px;">
        <input type="text" name="search" class="form-control me-2" placeholder="Cari nama karyawan..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary">Cari</button>
    </form>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <ul class="list-group">
                @forelse($jadwalkerja as $jadwal)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <strong>{{ $jadwal->karyawan->nama ?? 'Nama karyawan tidak ditemukan' }}</strong><br>
                            <small class="text-muted">
                                {{ $jadwal->hrs->nama ?? 'HR tidak tersedia' }} |
                                {{ \Carbon\Carbon::parse($jadwal->tanggal_mulai)->translatedFormat('l, d M Y') }} {{ $jadwal->waktu_mulai }} -
                                {{ \Carbon\Carbon::parse($jadwal->tanggal_selesai)->translatedFormat('d M Y') }}
                            </small>
                        </div>
                        <div>
                            <a href="{{ route('jadwalkerja.edit', $jadwal->id) }}" class="btn btn-warning btn-sm me-1">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                            <a href="{{ route('jadwalkerja.show', $jadwal->id) }}" class="btn btn-info btn-sm">
                                <i class="bi bi-eye"></i> Detail
                            </a>
                        </div>
                    </li>
                @empty
                    <li class="list-group-item text-center text-muted">Tidak ada data jadwal kerja.</li>
                @endforelse
            </ul>
        </div>
    </div>
@endsection
