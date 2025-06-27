@extends('layouts.app')

@section('title', 'Detail Cuti')

@section('content')
<div class="container">

{{-- Notifikasi sukses --}}Add commentMore actions
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    {{-- Notifikasi error --}}
    @elseif (session('errors'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('errors') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Detail Cuti</h4>
        </div>
        <div class="card-body">
            @if ($cuti)
                <div class="mb-4">
                    <p><strong>Karyawan:</strong> {{ $cuti->karyawan->nama ?? 'Tanpa Nama Karyawan' }}</p>
                    <p><strong>Tanggal Mulai:</strong> {{ $cuti->tanggal_mulai }}</p>
                    <p><strong>Tanggal Selesai:</strong> {{ $cuti->tanggal_selesai }}</p>
                    <p><strong>Keterangan Cuti:</strong> {{ $cuti->keterangan_cuti }}</p>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('cuti.edit', $cuti->id) }}" class="btn btn-warning">Edit</a>

                    <form action="{{ route('cuti.destroy', $cuti->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data cuti ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>

                    <a href="{{ route('cuti.index') }}" class="btn btn-secondary">← Kembali ke daftar</a>
                </div>
            @else
                <p class="text-danger">Data cuti tidak ditemukan.</p>
            @endif
        </div>
    </div>
</div>
@endsection
