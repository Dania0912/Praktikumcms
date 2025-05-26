@extends('layouts.app')

@section('title', 'Detail Penggajian')

@section('content')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm border-0 mt-3">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Detail Penggajian</h4>
        </div>
        <div class="card-body">
            <div class="mb-4">
                <p><strong>ID Penggajian:</strong> {{ $penggajian->id }}</p>
                <p><strong>Nama Karyawan:</strong> {{ $penggajian->karyawan->nama ?? '-' }}</p>
                <p><strong>Gaji Pokok:</strong> Rp {{ number_format($penggajian->gaji_pokok, 0, ',', '.') }}</p>
                <p><strong>Potongan:</strong> Rp {{ number_format($penggajian->potongan, 0, ',', '.') }}</p>
                <p><strong>Bonus:</strong> Rp {{ number_format($penggajian->bonus, 0, ',', '.') }}</p>
                <p><strong>Catatan:</strong> {{ $penggajian->catatan ?? '-' }}</p>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('penggajian.index') }}" class="btn btn-secondary">
                    ← Kembali ke daftar
                </a>
                <div>
                    <a href="{{ route('penggajian.edit', $penggajian->id) }}" class="btn btn-warning me-2">
                        <i class="bi bi-pencil-square"></i> Edit
                    </a>
                    <a href="{{ route('penggajian.delete', $penggajian->id) }}" class="btn btn-danger">
                        <i class="bi bi-trash"></i> Hapus
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
