@extends('layouts.app')

@section('title', 'Edit Karyawan')

@section('content')
    <h1>Edit Karyawan</h1>

    <form method="POST" action="{{ route('karyawan.update', $karyawan->id) }}">
        @csrf
        @method('PUT')

        <label>Nama:</label><br>
        <input type="text" name="nama" value="{{ $karyawan->nama }}"><br><br>

        <label>Tanggal Lahir:</label><br>
        <input type="date" name="tanggal_lahir" value="{{ $karyawan->tanggal_lahir }}"><br><br>

        <label>Alamat:</label><br>
        <input type="text" name="alamat" value="{{ $karyawan->alamat }}"><br><br>

        <label>Jabatan:</label><br>
        <input type="text" name="jabatan" value="{{ $karyawan->jabatan }}"><br><br>

        <label>Riwayat Pekerjaan:</label><br>
        <input type="text" name="riwayat_pekerjaan" value="{{ $karyawan->riwayat_pekerjaan }}"><br><br>

        <button style="margin-top: 10px;">Simpan</button>
    </form>

    <br>
    <a href="{{ route('karyawan.show', $karyawan->id) }}">← Kembali ke detail</a>
@endsection