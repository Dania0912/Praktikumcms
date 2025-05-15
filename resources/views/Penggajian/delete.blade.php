@extends('layouts.app')

@section('title', 'Konfirmasi Hapus Penggajian')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-danger text-white">
            <h4 class="mb-0">Konfirmasi Hapus Penggajian</h4>
        </div>
        <div class="card-body">
            <p class="mb-4">Apakah Anda yakin ingin menghapus data penggajian berikut?</p>

            <ul class="list-group mb-4">
                <li class="list-group-item">
                    <strong>Gaji Pokok:</strong> Rp {{ number_format($penggajian->gaji_pokok, 0, ',', '.') }}
                </li>
                <li class="list-group-item">
                    <strong>Potongan:</strong> Rp {{ number_format($penggajian->potongan, 0, ',', '.') }}
                </li>
                <li class="list-group-item">
                    <strong>Bonus:</strong> Rp {{ number_format($penggajian->bonus, 0, ',', '.') }}
                </li>
                <li class="list-group-item">
                    <strong>Catatan:</strong> {{ $penggajian->catatan ?? '-' }}
                </li>
            </ul>

            <form action="{{ route('penggajian.destroy', $penggajian->id) }}" method="POST" class="d-flex justify-content-between">
                @csrf
                @method('DELETE')

                <a href="{{ route('penggajian.index') }}" class="btn btn-secondary">
                    ← Batal
                </a>
                <button type="submit" class="btn btn-danger">
                    <i class="bi bi-trash me-1"></i> Hapus Penggajian
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
