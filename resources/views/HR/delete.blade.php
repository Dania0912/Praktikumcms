@extends('layouts.app')

@section('content')
    <h1>Konfirmasi Hapus HR</h1>
    <p>Apakah Anda yakin ingin menghapus data HR berikut?</p>

    <p><strong>Nama:</strong> {{ $hr->nama }}</p>
    <p><strong>Jabatan:</strong> {{ $hr->jabatan }}</p>

    <form action="{{ route('hr.destroy', $hr->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Hapus</button>
        <a href="{{ route('hr.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
