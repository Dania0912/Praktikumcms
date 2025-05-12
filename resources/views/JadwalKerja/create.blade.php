@extends('layouts.app')

@section('title', 'Tambah Jadwal Kerja')

@section('content')
    <h2 style="margin-bottom: 16px;">Tambah Jadwal Kerja Baru</h2>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('jadwalkerja.store') }}" style="line-height: 2;">
        @csrf
        <label>Nama Karyawan:
            <select name="karyawan_id" required>
                @foreach($karyawans as $karyawan)
                    <option value="{{ $karyawan->id }}">{{ $karyawan->nama }}</option>
                @endforeach
            </select>
        </label><br>
        <label>Tanggal Mulai: <input type="date" name="tanggal_mulai" required></label><br>
        <label>Tanggal Selesai: <input type="date" name="tanggal_selesai" required></label><br>
        <label>Waktu Mulai: <input type="time" name="waktu_mulai" required></label><br>
        <label>Waktu Selesai: <input type="time" name="waktu_selesai" required></label><br>
        <button type="submit" style="margin-top: 10px;">Tambah</button>
    </form>

    <a href="{{ route('jadwalkerja.index') }}" style="display: inline-block; margin-top: 20px;">← Kembali ke daftar</a>
@endsection
