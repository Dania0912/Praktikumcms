@extends('layouts.app') <!-- Menggunakan layout app -->

@section('content')
<div class="container mt-5">
    <h1>{{ $karyawan->Nama }}</h1>

    <p><strong>ID:</strong> {{ $karyawan->ID_Karyawan }}</p>
    <p><strong>Tanggal Lahir:</strong> {{ $karyawan->Tanggal_Lahir }}</p>
    <p><strong>Alamat:</strong> {{ $karyawan->Alamat }}</p>
    <p><strong>Jabatan:</strong> {{ $karyawan->Jabatan }}</p>
    <p><strong>Riwayat Pekerjaan:</strong> {{ $karyawan->Riwayat_Pekerjaan }}</p>

    <div class="mt-3">
        <a href="{{ route('karyawan.edit', $karyawan->ID_Karyawan) }}" class="btn btn-warning">✏️ Edit</a> |
        <a href="{{ route('karyawan.confirmDelete', $karyawan->ID_Karyawan) }}" class="btn btn-danger">🗑️ Hapus</a><br>
        <a href="{{ route('karyawan.index') }}" class="btn btn-secondary mt-3">← Kembali ke daftar</a>
    </div>
</div>
@endsection