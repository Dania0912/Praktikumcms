@extends('layouts.app')

@section('content')
    <h1>Detail Penggajian</h1>

    @if ($penggajian)
        <h2>ID Penggajian: {{ $penggajian->ID_Penggajian }}</h2>
        <p><strong>Gaji Pokok:</strong> {{ number_format($penggajian->Gaji_Pokok, 0, ',', '.') }}</p>
        <p><strong>Potongan:</strong> {{ number_format($penggajian->Potongan, 0, ',', '.') }}</p>
        <p><strong>Bonus:</strong> {{ number_format($penggajian->Bonus, 0, ',', '.') }}</p>
        <p><strong>Catatan:</strong> {{ $penggajian->Catatan }}</p>

        <a href="{{ route('penggajian.edit', $penggajian->ID_Penggajian) }}">✏️ Edit</a> |
        <a href="{{ route('penggajian.confirmDelete', $penggajian->ID_Penggajian) }}">🗑️ Hapus</a><br>
    @else
        <p style="color: red;">Data Penggajian tidak ditemukan.</p>
    @endif

    <a href="{{ route('penggajian.index') }}">← Kembali ke daftar</a>
@endsection
@extends('layouts.app')

@section('content')
    <h1>Detail Penggajian</h1>

    @if ($penggajian)
        <h2>ID Penggajian: {{ $penggajian->ID_Penggajian }}</h2>
        <p><strong>Gaji Pokok:</strong> {{ number_format($penggajian->Gaji_Pokok, 0, ',', '.') }}</p>
        <p><strong>Potongan:</strong> {{ number_format($penggajian->Potongan, 0, ',', '.') }}</p>
        <p><strong>Bonus:</strong> {{ number_format($penggajian->Bonus, 0, ',', '.') }}</p>
        <p><strong>Catatan:</strong> {{ $penggajian->Catatan }}</p>

        <a href="{{ route('penggajian.edit', $penggajian->ID_Penggajian) }}">✏️ Edit</a> |
        <a href="{{ route('penggajian.confirmDelete', $penggajian->ID_Penggajian) }}">🗑️ Hapus</a><br>
    @else
        <p style="color: red;">Data Penggajian tidak ditemukan.</p>
    @endif

    <a href="{{ route('penggajian.index') }}">← Kembali ke daftar</a>
@endsection