@extends('layouts.app')

@section('content')
    <h1>Hapus Jadwal Kerja</h1>

    <p>Apakah Anda yakin ingin menghapus jadwal dengan ID <strong>{{ $jadwalKerja->ID_Jadwal }}</strong>?</p>

    <form method="POST" action="{{ route('jadwalkerja.destroy', $jadwalKerja->ID_Jadwal) }}">
        @csrf
        @method('DELETE')

        <button type="submit">🗑️ Hapus</button>
    </form>

    <a href="{{ route('jadwalkerja.index') }}">← Batal</a>
@endsection
