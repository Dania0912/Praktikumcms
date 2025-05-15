@extends('layouts.app')

@section('title', 'Detail Penggajian')

@section('content')
<div class="container">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Detail Penggajian</h4>
        </div>
        <div class="card-body">
            <div class="mb-4">
                <p><strong>ID Penggajian:</strong> {{ $penggajian->id }}</p>
                <p><strong>Gaji Pokok:</strong> {{ number_format($penggajian->Gaji_Pokok, 0, ',', '.') }}</p>
                <p><strong>Potongan:</strong> {{ number_format($penggajian->Potongan, 0, ',', '.') }}</p>
                <p><strong>Bonus:</strong> {{ number_format($penggajian->Bonus, 0, ',', '.') }}</p>
                <p><strong>Catatan:</strong> {{ $penggajian->Catatan }}</p>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('penggajian.edit', $penggajian->id) }}" class="btn btn-warning">
                    Edit
                </a>

                <a href="{{ route('penggajian.delete', $penggajian->id) }}" class="btn btn-danger">
                Hapus
                </a>


                <a href="{{ route('penggajian.index') }}" class="btn btn-secondary">
                    ← Kembali ke daftar
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
