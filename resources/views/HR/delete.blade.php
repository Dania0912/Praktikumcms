@extends('layouts.app')

@section('content')
    <h1>Hapus HR</h1>

    <p>Apakah Anda yakin ingin menghapus <strong>{{ $hr->Nama }}</strong>?</p>

    <form method="POST" action="{{ route('hr.destroy', $hr->ID_HR) }}">
        @csrf
        @method('DELETE')

        <button type="submit">🗑️ Hapus</button>
    </form>

    <a href="{{ route('hr.index') }}">← Batal</a>
@endsection