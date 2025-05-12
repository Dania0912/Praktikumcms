@extends('layouts.app')

@section('title', 'Tambah Cuti')

@section('content')
    <h2 style="margin-bottom: 16px;">Tambah Cuti Baru</h2>

    <form method="POST" action="{{ route('cuti.store') }}" style="line-height: 2;">
        @csrf
        <label>Nama Karyawan:
            <select name="karyawan_id" required>
                @foreach($karyawans as $karyawan)
                    <option value="{{ $karyawan->id }}">{{ $karyawan->nama }}</option>
                @endforeach
            </select>
        </label><br>
        <label>Tanggal Mulai: 
            <input type="date" name="tanggal_mulai" required>
        </label><br>

        <label>Tanggal Selesai: 
            <input type="date" name="tanggal_selesai" required>
        </label><br>

        <label>Keterangan Cuti: 
            <input type="text" name="keterangan_cuti" required>
        </label><br>

        <button type="submit" style="margin-top: 10px;">Tambah</button>
    </form>

    <a href="{{ route('cuti.index') }}" style="display: inline-block; margin-top: 20px;">← Kembali ke daftar</a>
@endsection
