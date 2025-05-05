@extends('layouts.app')

@section('content')
    <h1>Konfirmasi Hapus HR</h1>
    <p>Apakah Anda yakin ingin menghapus data HR berikut?</p>

    <p><strong>ID HR:</strong> {{ $hr->ID_HR }}</p>
    <p><strong>Nama:</strong> {{ $hr->Nama }}</p>
    <p><strong>Jabatan:</strong> {{ $hr->Jabatan }}</p>

    <form action="{{ route('hr.destroy', $hr->ID_HR) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Hapus</button>
        <a href="{{ route('hr.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
