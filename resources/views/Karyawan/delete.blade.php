@extends('layouts.app')

@section('title', 'Konfirmasi Hapus')

@section('content')
    <h1>Yakin ingin menghapus karyawan ini?</h1>

    <p><strong>{{ $karyawan->nama }}</strong></p>
    <p>{{ $karyawan->email }}</p>

    <form action="{{ route('karyawan.destroy', $karyawan->id) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button style="margin-right: 10px;">Ya, hapus</button>
    </form>

    <a href="{{ route('karyawan.show', $karyawan->id) }}">Batal</a>
@endsection