@extends('layouts.app') <!-- Menggunakan layout app -->

@section('content')
<div class="container mt-5">
    <h1>Hapus Karyawan</h1>

    <p>Apakah Anda yakin ingin menghapus <strong>{{ $karyawan->Nama }}</strong>?</p>

    <!-- Form untuk menghapus data karyawan -->
    <form method="POST" action="{{ route('karyawan.destroy', $karyawan->ID_Karyawan) }}">
        @csrf
        @method('DELETE')

        <!-- Tombol untuk menghapus -->
        <button type="submit" class="btn btn-danger">🗑️ Hapus</button>
    </form>

    <!-- Link untuk membatalkan dan kembali ke daftar -->
    <a href="{{ route('karyawan.index') }}" class="btn btn-secondary mt-3">← Batal</a>
</div>
@endsection
