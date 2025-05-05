@extends('layouts.app')

@section('title', 'Konfirmasi Hapus')

@section('content')
    <h1>Yakin ingin menghapus data penggajian ini?</h1>

    <p><strong>Gaji Pokok:</strong> Rp {{ number_format($penggajian->gaji_pokok, 0, ',', '.') }}</p>
    <p><strong>Catatan:</strong> {{ $penggajian->catatan ?? '-' }}</p>

    <form action="{{ route('penggajian.destroy', $penggajian->id) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button style="margin-right: 10px;">Ya, hapus</button>
    </form>

    <a href="{{ route('penggajian.show', $penggajian->id) }}">Batal</a>
@endsection
