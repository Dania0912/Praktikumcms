@extends('layouts.app')

@section('content')
    <h1>Detail Cuti</h1>

    <p><strong>ID Cuti:</strong> {{ $cuti->ID_Cuti }}</p>
    <p><strong>Tanggal Mulai:</strong> {{ $cuti->Tanggal_Mulai }}</p>
    <p><strong>Tanggal Selesai:</strong> {{ $cuti->Tanggal_Selesai }}</p>
    <p><strong>Keterangan:</strong> {{ $cuti->Keterangan_Cuti }}</p>

    <a href="{{ route('cuti.edit', $cuti->ID_Cuti) }}">✏️ Edit</a> |
    <a href="{{ route('cuti.confirmDelete', $cuti->ID_Cuti) }}">🗑️ Hapus</a><br>
    <a href="{{ route('cuti.index') }}">← Kembali ke daftar</a>
@endsection
