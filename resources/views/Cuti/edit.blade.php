@extends('layouts.app')

@section('title', 'Edit Cuti')

@section('content')
    <h1>Edit Cuti</h1>

    <form method="POST" action="{{ route('cuti.update', $cuti->id) }}">
        @csrf
        @method('PUT')

        <label>Tanggal Mulai:</label><br>
        <input type="date" name="tanggal_mulai" value="{{ $cuti->tanggal_mulai }}"><br><br>

        <label>Tanggal Selesai:</label><br>
        <input type="date" name="tanggal_selesai" value="{{ $cuti->tanggal_selesai }}"><br><br>

        <label>Keterangan Cuti:</label><br>
        <input type="text" name="keterangan_cuti" value="{{ $cuti->keterangan_cuti }}"><br><br>

        <button style="margin-top: 10px;">Simpan</button>
    </form>

    <br>
    <a href="{{ route('cuti.show', $cuti->id) }}">← Kembali ke detail</a>
@endsection
