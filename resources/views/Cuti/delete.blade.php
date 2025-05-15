@extends('layouts.app')

@section('title', 'Konfirmasi Hapus Cuti')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-danger text-white">
            <h4 class="mb-0">Konfirmasi Hapus Cuti</h4>
        </div>
        <div class="card-body">
            <p class="mb-4">Apakah Anda yakin ingin menghapus data Cuti berikut?</p>

            <ul class="list-group mb-4">
                <li class="list-group-item">
                    <strong>Nama Karyawan:</strong> {{ $cuti->karyawan->nama ?? 'Tanpa Nama Karyawan' }}
                </li>
                <li class="list-group-item">
                    <strong>Tanggal Mulai:</strong> {{ $cuti->tanggal_mulai }}
                </li>
                <li class="list-group-item">
                    <strong>Tanggal Selesai:</strong> {{ $cuti->tanggal_selesai }}
                </li>
                <li class="list-group-item">
                    <strong>Keterangan:</strong> {{ $cuti->keterangan_cuti }}
                </li>
            </ul>

            <form action="{{ route('cuti.destroy', $cuti->id) }}" method="POST" class="d-flex justify-content-between">
                @csrf
                @method('DELETE')

                <a href="{{ route('cuti.index') }}" class="btn btn-secondary">
                    ← Batal
                </a>
                <button type="submit" class="btn btn-danger">
                    <i class="bi bi-trash me-1"></i> Hapus Cuti
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
