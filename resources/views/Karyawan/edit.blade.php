@extends('layouts.app') <!-- Menggunakan layout app -->

@section('content')
<div class="container mt-5">
    <h1>Edit Karyawan</h1>

    <!-- Menampilkan error jika ada -->
    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form untuk mengedit data karyawan -->
    <form method="POST" action="{{ route('karyawan.update', $karyawan->ID_Karyawan) }}">
        @csrf
        @method('PUT')

        <!-- ID Karyawan, tidak bisa diubah -->
        <label>ID Karyawan:</label><br>
        <input type="text" name="ID_Karyawan" value="{{ $karyawan->ID_Karyawan }}" readonly class="form-control"><br>

        <!-- Nama -->
        <label>Nama:</label><br>
        <input type="text" name="Nama" value="{{ old('Nama', $karyawan->Nama) }}" class="form-control"><br>

        <!-- Tanggal Lahir -->
        <label>Tanggal Lahir:</label><br>
        <input type="date" name="Tanggal_Lahir" value="{{ old('Tanggal_Lahir', $karyawan->Tanggal_Lahir) }}" class="form-control"><br>

        <!-- Alamat -->
        <label>Alamat:</label><br>
        <input type="text" name="Alamat" value="{{ old('Alamat', $karyawan->Alamat) }}" class="form-control"><br>

        <!-- Jabatan -->
        <label>Jabatan:</label><br>
        <input type="text" name="Jabatan" value="{{ old('Jabatan', $karyawan->Jabatan) }}" class="form-control"><br>

        <!-- Riwayat Pekerjaan -->
        <label>Riwayat Pekerjaan:</label><br>
        <input type="text" name="Riwayat_Pekerjaan" value="{{ old('Riwayat_Pekerjaan', $karyawan->Riwayat_Pekerjaan) }}" class="form-control"><br>

        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    </form>

    <!-- Kembali ke halaman detail -->
    <a href="{{ route('karyawan.show', $karyawan->ID_Karyawan) }}" class="btn btn-secondary mt-3">← Kembali ke detail</a>
</div>
@endsection