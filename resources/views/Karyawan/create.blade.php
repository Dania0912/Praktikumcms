@extends('layouts.app')

@section('title', 'Tambah Karyawan')

@section('content')
    <h2 style="margin-bottom: 16px;">Tambah Karyawan Baru</h2>

    <form method="POST" action="{{ route('karyawan.store') }}" style="line-height: 2;">
        @csrf
        <label>Nama: <input type="text" name="nama" required></label><br>
        <label>Tanggal Lahir: <input type="date" name="tanggal_lahir" required></label><br>
        <label>Alamat: <input type="text" name="alamat" required></label><br>
        <label>Jabatan: <input type="text" name="jabatan" required></label><br>
        <label>Riwayat Pekerjaan: <input type="text" name="riwayat_pekerjaan" required></label><br>
        <button type="submit" style="margin-top: 10px;">Tambah</button>
    </form>

    <a href="{{ route('karyawan.index') }}" style="display: inline-block; margin-top: 20px;">← Kembali ke daftar</a>
@endsection