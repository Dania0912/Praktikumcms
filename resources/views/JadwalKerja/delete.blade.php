@extends('layouts.app')

@section('title', 'Konfirmasi Hapus Jadwal Kerja')

@section('content')
<div class="container">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-danger text-white">
            <h4 class="mb-0">Konfirmasi Hapus Jadwal Kerja</h4>
        </div>
        <div class="card-body">
            <p class="mb-4">Apakah Anda yakin ingin menghapus data jadwal kerja berikut?</p>

            <ul class="list-group mb-4">
                <li class="list-group-item">
                    <strong>Karyawan:</strong> {{ $jadwalkerja->karyawan->nama }}
                </li>
                <li class="list-group-item">
                    <strong>HR:</strong> {{ $jadwalkerja->hr->nama }}
                </li>
                <li class="list-group-item">
                    <strong>Tanggal Mulai:</strong> {{ $jadwalkerja->tanggal_mulai->format('Y-m-d') }}
                </li>
                <li class="list-group-item">
                    <strong>Tanggal Selesai:</strong> {{ $jadwalkerja->tanggal_selesai->format('Y-m-d') }}
                </li>
                <li class="list-group-item">
                    <strong>Waktu Mulai:</strong> {{ $jadwalkerja->waktu_mulai->format('H:i') }}
                </li>
                <li class="list-group-item">
                    <strong>Waktu Selesai:</strong> {{ $jadwalkerja->waktu_selesai->format('H:i') }}
                </li>
            </ul>

            <form action="{{ route('jadwalkerja.destroy', $jadwalkerja->id) }}" method="POST" class="d-flex justify-content-between">
                @csrf
                @method('DELETE')

                <a href="{{ route('jadwalkerja.index') }}" class="btn btn-secondary">
                    ← Batal
                </a>
                <button type="submit" class="btn btn-danger">
                    <i class="bi bi-trash me-1"></i> Hapus Jadwal
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
