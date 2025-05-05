@extends('layouts.app')

@section('title', 'Detail Cuti')

@section('content')
    <h2>Detail Cuti</h2>

    <p><strong>Tanggal Mulai:</strong> {{ $cuti->tanggal_mulai }}</p>
    <p><strong>Tanggal Selesai:</strong> {{ $cuti->tanggal_selesai }}</p>
    <p><strong>Keterangan Cuti:</strong> {{ $cuti->keterangan_cuti }}</p>

    <br>

    <a href="{{ route('cuti.edit', $cuti->id) }}">✏️ Edit</a> |
    <a href="{{ route('cuti.delete', $cuti->id) }}">🗑️ Hapus</a>

    <br><br>

    <a href="{{ route('cuti.index') }}">← Kembali ke daftar</a>
@endsection
