@extends('layouts.app')

@section('title', 'Detail Penggajian')

@section('content')
    <h2>Detail Penggajian</h2>

    <p><strong>ID Penggajian:</strong> {{ $penggajian->ID_Penggajian }}</p>
    <p><strong>Gaji Pokok:</strong> {{ number_format($penggajian->Gaji_Pokok, 0, ',', '.') }}</p>
    <p><strong>Potongan:</strong> {{ number_format($penggajian->Potongan, 0, ',', '.') }}</p>
    <p><strong>Bonus:</strong> {{ number_format($penggajian->Bonus, 0, ',', '.') }}</p>
    <p><strong>Catatan:</strong> {{ $penggajian->Catatan }}</p>

    <br>

    <a href="{{ route('penggajian.edit', $penggajian->ID_Penggajian) }}">✏️ Edit</a> |
    <a href="{{ route('penggajian.confirmDelete', $penggajian->ID_Penggajian) }}">🗑️ Hapus</a>

    <br><br>

    <a href="{{ route('penggajian.index') }}">← Kembali ke daftar</a>
@endsection
