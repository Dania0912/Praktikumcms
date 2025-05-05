@extends('layouts.app')

@section('title', 'Konfirmasi Hapus')

@section('content')
    <h1>Yakin ingin menghapus jadwal kerja ini?</h1>

    <p><strong>ID Jadwal: {{ $jadwalKerja->id_jadwal }}</strong></p>
    <p>Tanggal: {{ $jadwalKerja->tanggal_mulai }} s/d {{ $jadwalKerja->tanggal_selesai }}</p>

    <form action="{{ route('jadwalkerja.destroy', $jadwalKerja->id_jadwal) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button style="margin-right: 10px;">Ya, hapus</button>
    </form>

    <a href="{{ route('jadwalkerja.show', $jadwalKerja->id_jadwal) }}">Batal</a>
@endsection
