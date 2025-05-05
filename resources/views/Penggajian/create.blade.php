@extends('layouts.app')

@section('title', 'Tambah Penggajian')

@section('content')
    <h2 style="margin-bottom: 16px;">Tambah Data Penggajian</h2>

    @if ($errors->any())
        <div style="color:red; margin-bottom: 12px;">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form method="POST" action="{{ route('penggajian.store') }}" style="line-height: 2;">
        @csrf

        {{-- Jika pakai relasi ke karyawan, bisa ditambahkan select di sini --}}
        {{-- 
        <label>Nama Karyawan:
            <select name="karyawan_id" required>
                @foreach($karyawans as $karyawan)
                    <option value="{{ $karyawan->id }}">{{ $karyawan->nama }}</option>
                @endforeach
            </select>
        </label><br>
        --}}

        <label>Gaji Pokok: <input type="number" name="gaji_pokok" required></label><br>
        <label>Potongan: <input type="number" name="potongan" value="0"></label><br>
        <label>Bonus: <input type="number" name="bonus" value="0"></label><br>
        <label>Catatan: <input type="text" name="catatan"></label><br>

        <button type="submit" style="margin-top: 10px;">Simpan</button>
    </form>

    <a href="{{ route('penggajian.index') }}" style="display: inline-block; margin-top: 20px;">← Kembali ke daftar</a>
@endsection
