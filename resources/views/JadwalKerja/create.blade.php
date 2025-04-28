@extends('layouts.app')

@section('content')
    <h1>Tambah Jadwal Kerja</h1>

    @if ($errors->any())
        <div style="color:red;">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form method="POST" action="{{ route('jadwalkerja.store') }}">
        @csrf

        <label>ID Jadwal:</label><br>
        <input type="text" name="ID_Jadwal"><br>

        <label>Tanggal Mulai:</label><br>
        <input type="date" name="Tanggal_Mulai"><br>

        <label>Tanggal Selesai:</label><br>
        <input type="date" name="Tanggal_Selesai"><br>

        <label>Waktu Mulai:</label><br>
        <input type="time" name="Waktu_Mulai"><br>

        <label>Waktu Selesai:</label><br>
        <input type="time" name="Waktu_Selesai"><br>

        <button type="submit">Simpan</button>
    </form>

    <a href="{{ route('jadwalkerja.index') }}">← Kembali ke daftar</a>
@endsection