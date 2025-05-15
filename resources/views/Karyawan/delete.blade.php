@extends('layouts.app')

@section('title', 'Konfirmasi Hapus Karyawan')

@section('content')
<div class="container">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-danger text-white">
            <h4 class="mb-0">Konfirmasi Hapus Karyawan</h4>
        </div>
        <div class="card-body">
            <p class="mb-4">Yakin ingin menghapus karyawan ini?</p>

            <ul class="list-group mb-4">
                <li class="list-group-item">
                    <strong>Nama:</strong> {{ $karyawan->nama }}
                </li>
                <li class="list-group-item">
                    <strong>Email:</strong> {{ $karyawan->email }}
                </li>
            </ul>

            <form action="{{ route('karyawan.destroy', $karyawan->id) }}" method="POST" class="d-flex justify-content-between">
                @csrf
                @method('DELETE')

                <a href="{{ route('karyawan.index') }}" class="btn btn-secondary">
                    ← Batal
                </a>
                <button type="submit" class="btn btn-danger">
                    <i class="bi bi-trash me-1"></i> Hapus Karyawan
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
