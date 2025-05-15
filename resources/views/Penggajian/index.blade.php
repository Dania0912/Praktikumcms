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
                        <div>
                            <strong>{{ $pg->karyawan->nama ?? 'Nama Karyawan Tidak Ditemukan' }}</strong><br>
                            <small>
                                Gaji Pokok: Rp {{ number_format($pg->gaji_pokok, 0, ',', '.') }} <br>
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
                @empty
                    <li class="list-group-item text-center text-muted">Tidak ada data penggajian.</li>
                @endforelse
            </ul>
        </div>
    </div>
@endsection
