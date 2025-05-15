@extends('layouts.app')

@section('title', 'Detail Jadwal Kerja')

@section('content')
<div class="container">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Detail Jadwal Kerja</h4>
        </div>
        <div class="card-body">
            @if ($jadwalkerja)
                <div class="mb-4">
                    <p><strong>Karyawan:</strong> {{ $jadwalkerja->karyawan->nama }}</p>
                    <p><strong>HR:</strong> {{ $jadwalkerja->hr?->nama ?? 'Data HR tidak ditemukan' }}</p>
                    <p><strong>Tanggal Mulai:</strong> {{ \Carbon\Carbon::parse($jadwalkerja->tanggal_mulai)->translatedFormat('d M Y') }}</p>
                    <p><strong>Tanggal Selesai:</strong> {{ \Carbon\Carbon::parse($jadwalkerja->tanggal_selesai)->translatedFormat('d M Y') }}</p>
                    <p><strong>Waktu Mulai:</strong> {{ $jadwalkerja->waktu_mulai }}</p>
                    <p><strong>Waktu Selesai:</strong> {{ $jadwalkerja->waktu_selesai }}</p>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('jadwalkerja.edit', $jadwalkerja->id) }}" class="btn btn-warning">
                        Edit
                    </a>
                    <a href="{{ route('jadwalkerja.delete', $jadwalkerja->id) }}" class="btn btn-danger">
                        Hapus
                    </a>
                    <a href="{{ route('jadwalkerja.index') }}" class="btn btn-secondary">
                        ← Kembali ke daftar
                    </a>
                </div>
            @else
                <p class="text-danger">Data jadwal kerja tidak ditemukan.</p>
                <a href="{{ route('jadwalkerja.index') }}" class="btn btn-secondary mt-3">← Kembali ke daftar</a>
            @endif
        </div>
    </div>
</div>
@endsection
