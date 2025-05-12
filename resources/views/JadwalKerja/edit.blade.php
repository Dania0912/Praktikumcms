@extends('layouts.app')

@section('title', 'Edit Jadwal Kerja')

@section('content')
    <h1>Edit Jadwal Kerja</h1>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('jadwalkerja.update', $jadwalkerja->id) }}">
        @csrf
        @method('PUT')

        <label>ID Jadwal:</label><br>
        <input type="text" name="id_jadwal" value="{{ $jadwalkerja->id}}" readonly><br><br>

        <label>Tanggal Mulai:</label><br>
        <input type="date" name="tanggal_mulai" value="{{ $jadwalkerja->tanggal_mulai }}"><br><br>

        <label>Tanggal Selesai:</label><br>
        <input type="date" name="tanggal_selesai" value="{{ $jadwalkerja->tanggal_selesai }}"><br><br>

        <label>Waktu Mulai:</label><br>
        <input type="time" name="waktu_mulai" value="{{ $jadwalkerja->waktu_mulai }}"><br><br>

        <label>Waktu Selesai:</label><br>
        <input type="time" name="waktu_selesai" value="{{ $jadwalkerja->waktu_selesai }}"><br><br>

        <button type="submit" style="margin-top: 10px;">Simpan</button>
    </form>

    <a href="{{ route('jadwalkerja.show', $jadwalkerja->id) }}">← Kembali ke detail</a>
@endsection
