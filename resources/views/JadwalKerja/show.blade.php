@extends('layouts.app')

@section('title', 'Detail Jadwal Kerja')

@section('content')
    <h2>Detail Jadwal Kerja</h2>

    <p><strong>ID Jadwal:</strong> {{ $jadwalKerja->ID_Jadwal }}</p>
    <p><strong>Tanggal Mulai:</strong> {{ $jadwalKerja->Tanggal_Mulai }}</p>
    <p><strong>Tanggal Selesai:</strong> {{ $jadwalKerja->Tanggal_Selesai }}</p>
    <p><strong>Waktu Mulai:</strong> {{ $jadwalKerja->Waktu_Mulai }}</p>
    <p><strong>Waktu Selesai:</strong> {{ $jadwalKerja->Waktu_Selesai }}</p>

    <br>

    <a href="{{ route('jadwalkerja.edit', $jadwalKerja->ID_Jadwal) }}">✏️ Edit</a> |
    <a href="{{ route('jadwalkerja.confirmDelete', $jadwalKerja->ID_Jadwal) }}">🗑️ Hapus</a>

    <br><br>

    <a href="{{ route('jadwalkerja.index') }}">← Kembali ke daftar</a>
@endsection
