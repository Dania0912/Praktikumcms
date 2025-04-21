@extends('layouts.app')

@section('content')
    <h1>Edit Jadwal Kerja</h1>

    @if ($errors->any())
        <div style="color:red;">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form method="POST" action="{{ route('jadwalkerja.update', $jadwalKerja->ID_Jadwal) }}">
        @csrf
        @method('PUT')

        <label>ID Jadwal:</label><br>
        <input type="text" name="ID_Jadwal" value="{{ $jadwalKerja->ID_Jadwal }}" readonly><br>

        <label>Tanggal Mulai:</label><br>
        <input type="date" name="Tanggal_Mulai" value="{{ $jadwalKerja->Tanggal_Mulai }}"><br>

        <label>Tanggal Selesai:</label><br>
        <input type="date" name="Tanggal_Selesai" value="{{ $jadwalKerja->Tanggal_Selesai }}"><br>

        <label>Waktu Mulai:</label><br>
        <input type="time" name="Waktu_Mulai" value="{{ $jadwalKerja->Waktu_Mulai }}"><br>

        <label>Waktu Selesai:</label><br>
        <input type="time" name="Waktu_Selesai" value="{{ $jadwalKerja->Waktu_Selesai }}"><br>

        <button type="submit">Simpan</button>
    </form>

    <a href="{{ route('jadwalkerja.show', $jadwalKerja->ID_Jadwal) }}">← Kembali ke detail</a>
@endsection
