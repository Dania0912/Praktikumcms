@extends('layouts.app') <!-- Menggunakan layout app -->

@section('content')
<div class="container mt-5">
    <h1>Tambah Karyawan</h1>

    <!-- Menampilkan pesan error jika ada -->
    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form untuk menambah karyawan -->
    <form method="POST" action="{{ route('karyawan.store') }}">
        @csrf

        <!-- Input ID Karyawan -->
        <label>ID Karyawan:</label><br>
        <input type="text" name="ID_Karyawan" value="{{ old('ID_Karyawan') }}"><br>

        <!-- Input Nama -->
        <label>Nama:</label><br>
        <input type="text" name="Nama" value="{{ old('Nama') }}"><br>

        <!-- Input Tanggal Lahir -->
        <label>Tanggal Lahir:</label><br>
        <input type="date" name="Tanggal_Lahir" value="{{ old('Tanggal_Lahir') }}"><br>

        <!-- Input Alamat -->
        <label>Alamat:</label><br>
        <input type="text" name="Alamat" value="{{ old('Alamat') }}"><br>

        <!-- Input Jabatan -->
        <label>Jabatan:</label><br>
        <input type="text" name="Jabatan" value="{{ old('Jabatan') }}"><br>

        <!-- Input Riwayat Pekerjaan -->
        <label>Riwayat Pekerjaan:</label><br>
        <input type="text" name="Riwayat_Pekerjaan" value="{{ old('Riwayat_Pekerjaan') }}"><br>

        <!-- Tombol Submit -->
        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    </form>

    <!-- Link kembali ke daftar karyawan -->
    <a href="{{ route('karyawan.index') }}" class="btn btn-secondary mt-3">← Kembali ke daftar</a>
</div>
@endsection