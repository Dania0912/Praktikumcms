@extends('layouts.app')

@section('content')
    <h1>Hapus Penggajian</h1>

    <p>Apakah Anda yakin ingin menghapus data penggajian <strong>{{ $penggajian->ID_Penggajian }}</strong>?</p>

    <form method="POST" action="{{ route('penggajian.destroy', $penggajian->ID_Penggajian) }}">
        @csrf
        @method('DELETE')

        <button type="submit">🗑️ Hapus</button>
    </form>

    <a href="{{ route('penggajian.index') }}">← Batal</a>
@endsection