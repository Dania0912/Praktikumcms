@extends('layouts.app')

@section('title', 'Detail Penggajian')

@section('content')
<div class="container">

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

    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Detail Penggajian</h4>
        </div>
        <div class="card-body">
            @if ($penggajian)
                <div class="mb-4">
                    <p><strong>Nama Karyawan:</strong> {{ $penggajian->karyawan->nama ?? '-' }}</p>
                    <p><strong>Gaji Pokok:</strong> Rp {{ number_format($penggajian->gaji_pokok, 0, ',', '.') }}</p>
                    <p><strong>Potongan:</strong> Rp {{ number_format($penggajian->potongan, 0, ',', '.') }}</p>
                    <p><strong>Bonus:</strong> Rp {{ number_format($penggajian->bonus, 0, ',', '.') }}</p>
                    <p><strong>Catatan:</strong> {{ $penggajian->catatan ?? '-' }}</p>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('penggajian.edit', $penggajian->id) }}" class="btn btn-warning">Edit</a>
                    <a href="{{ route('penggajian.delete', $penggajian->id) }}" class="btn btn-danger">Hapus</a>
                    <a href="{{ route('penggajian.index') }}" class="btn btn-secondary">← Kembali ke daftar</a>
                </div>
            @else
                <p class="text-danger">Data penggajian tidak ditemukan.</p>
                <a href="{{ route('penggajian.index') }}" class="btn btn-secondary mt-3">← Kembali ke daftar</a>
            @endif
        </div>
    </div>
</div>
@endsection
