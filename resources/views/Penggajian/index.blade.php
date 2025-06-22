@extends('layouts.app')

@section('title', 'Daftar Penggajian')

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
        <h2 class="fw-bold">Daftar Penggajian</h2>
        <a href="{{ route('penggajian.create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle me-1"></i> Tambah Penggajian
        </a>
    </div>

    <!-- Form Pencarian -->
    <form action="{{ route('penggajian.index') }}" method="GET" class="mb-4 d-flex" style="max-width: 400px;">
        <input type="text" name="search" class="form-control me-2" placeholder="Cari nama karyawan..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary">Cari</button>
    </form>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            @if($penggajian->isEmpty())
                <p class="text-center text-muted mb-0">Tidak ada data penggajian.</p>
            @else
                <ul class="list-group">
                    @foreach($penggajian as $pg)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <strong>{{ $pg->karyawan->nama ?? 'Nama Karyawan Tidak Ditemukan' }}</strong><br>
                                <small>
                                    Gaji Pokok: Rp {{ number_format($pg->gaji_pokok, 0, ',', '.') }}<br>
                                    Potongan: Rp {{ number_format($pg->potongan, 0, ',', '.') }}<br>
                                    Bonus: Rp {{ number_format($pg->bonus, 0, ',', '.') }}
                                </small>
                            </div>
                            <div>
                                <a href="{{ route('penggajian.edit', $pg->id) }}" class="btn btn-warning btn-sm me-1">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <a href="{{ route('penggajian.show', $pg->id) }}" class="btn btn-info btn-sm me-1">
                                    <i class="bi bi-eye"></i> Detail
                                </a>
                                <a href="{{ route('penggajian.delete', $pg->id) }}" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i> Hapus
                                </a>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
@endsection
