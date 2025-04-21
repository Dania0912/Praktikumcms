@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Daftar Karyawan</h1>

    <!-- Menampilkan pesan jika ada -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tabel Daftar Karyawan -->
    <table class="table">
        <thead>
            <tr>
                <th>ID Karyawan</th>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th>Jabatan</th>
                <th>Riwayat Pekerjaan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($karyawans as $karyawan)
            <tr>
                <td>{{ $karyawan->ID_Karyawan }}</td>
                <td>{{ $karyawan->Nama }}</td>
                <td>{{ $karyawan->Tanggal_Lahir }}</td>
                <td>{{ $karyawan->Alamat }}</td>
                <td>{{ $karyawan->Jabatan }}</td>
                <td>{{ $karyawan->Riwayat_Pekerjaan }}</td>
                <td>
                    <a href="{{ route('karyawan.show', $karyawan->ID_Karyawan) }}">Lihat</a> |
                    <a href="{{ route('karyawan.edit', $karyawan->ID_Karyawan) }}">Edit</a> |
                    <a href="{{ route('karyawan.confirmDelete', $karyawan->ID_Karyawan) }}">Hapus</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
