@extends('layouts.app')

@section('title', 'Detail Karyawan')

@section('content')
    <h2>Detail Karyawan</h2>

    <p><strong>Nama:</strong> {{ $karyawan->nama }}</p>
    <p><strong>Tanggal Lahir:</strong> {{ $karyawan->tanggal_lahir }}</p>
    <p><strong>alamat:</strong> {{ $karyawan->alamat }}</p>
    <p><strong>jabatan:</strong> {{ $karyawan->jabatan }}</p>
    <p><strong>Riwayat Pekerjaan:</strong> {{ $karyawan->riwayat_pekerjaan }}</p>

    <br>

    <a href="{{ route('karyawan.edit', $karyawan->id) }}">✏️ Edit</a> |
    <a href="{{ route('karyawan.delete', $karyawan->id) }}">🗑️ Hapus</a>

    <br><br>

    <a href="{{ route('karyawan.index') }}">← Kembali ke daftar</a>
@endsection