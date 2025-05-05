@extends('layouts.app')

@section('title', 'Konfirmasi Hapus')

@section('content')
    <h1>Yakin ingin menghapus cuti ini?</h1>

    <p><strong>{{ $cuti->tanggal_mulai }} s.d. {{ $cuti->tanggal_selesai }}</strong></p>
    <p>{{ $cuti->keterangan_cuti }}</p>

    <form action="{{ route('cuti.destroy', $cuti->id) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button style="margin-right: 10px;">Ya, hapus</button>
    </form>

    <a href="{{ route('cuti.show', $cuti->id) }}">Batal</a>
@endsection
