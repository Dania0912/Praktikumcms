@extends('layouts.app')

@section('content')
    <h1>Hapus Data Cuti</h1>

    <p>Apakah Anda yakin ingin menghapus data cuti dengan ID <strong>{{ $cuti->ID_Cuti }}</strong>?</p>

    <form method="POST" action="{{ route('cuti.destroy', $cuti->ID_Cuti) }}">
        @csrf
        @method('DELETE')

        <button type="submit">🗑️ Hapus</button>
    </form>

    <a href="{{ route('cuti.index') }}">← Batal</a>
@endsection
