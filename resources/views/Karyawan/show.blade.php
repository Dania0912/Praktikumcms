@extends('layouts.app')

@section('title', 'Detail Karyawan')

@section('content')
<div class="container">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Detail Karyawan</h4>
        </div>
        <div class="card-body">
            <div class="mb-4">
                <p><strong>Nama:</strong> {{ $karyawan->nama }}</p>
                <p><strong>Tanggal Lahir:</strong> {{ $karyawan->tanggal_lahir }}</p>
                <p><strong>Alamat:</strong> {{ $karyawan->alamat }}</p>
                <p><strong>Jabatan:</strong> {{ $karyawan->jabatan }}</p>
                <p><strong>Riwayat Pekerjaan:</strong> {{ $karyawan->riwayat_pekerjaan }}</p>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('karyawan.edit', $karyawan->id) }}" class="btn btn-warning">
                    Edit
                </a>
                <a href="{{ route('karyawan.delete', $karyawan->id) }}" class="btn btn-danger">
                    Hapus
                </a>
                <a href="{{ route('karyawan.index') }}" class="btn btn-secondary">
                    ← Kembali ke daftar
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
