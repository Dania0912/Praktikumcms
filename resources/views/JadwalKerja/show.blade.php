@extends('layouts.app')

@section('title', 'Detail Jadwal Kerja')

@section('content')
    <h2>Detail Jadwal Kerja</h2>

    <p><strong>ID Jadwal:</strong> {{ $jadwalkerja->id }}</p>
    <p><strong>Tanggal Mulai:</strong> {{ $jadwalkerja->tanggal_mulai }}</p>
    <p><strong>Tanggal Selesai:</strong> {{ $jadwalkerja->tanggal_selesai }}</p>
    <p><strong>Waktu Mulai:</strong> {{ $jadwalkerja->waktu_mulai }}</p>
    <p><strong>Waktu Selesai:</strong> {{ $jadwalkerja->waktu_selesai }}</p>

    <br>

    <a href="{{ route('jadwalkerja.edit', $jadwalkerja->id) }}">✏️ Edit</a> |
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
    <br><br>

    <a href="{{ route('jadwalkerja.index') }}">← Kembali ke daftar</a>
@endsection
