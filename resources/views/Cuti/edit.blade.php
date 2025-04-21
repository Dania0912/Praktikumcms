@extends('layouts.app')

@section('content')
    <h1>Edit Data Cuti</h1>

    @if ($errors->any())
        <div style="color:red;">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form method="POST" action="{{ route('cuti.update', $cuti->ID_Cuti) }}">
        @csrf
        @method('PUT')

        <label>ID Cuti:</label><br>
        <input type="text" name="ID_Cuti" value="{{ $cuti->ID_Cuti }}" readonly><br>

        <label>Tanggal Mulai:</label><br>
        <input type="date" name="Tanggal_Mulai" value="{{ $cuti->Tanggal_Mulai }}"><br>

        <label>Tanggal Selesai:</label><br>
        <input type="date" name="Tanggal_Selesai" value="{{ $cuti->Tanggal_Selesai }}"><br>

        <label>Keterangan Cuti:</label><br>
        <input type="text" name="Keterangan_Cuti" value="{{ $cuti->Keterangan_Cuti }}"><br>

        <button type="submit">Simpan</button>
    </form>

    <a href="{{ route('cuti.show', $cuti->ID_Cuti) }}">← Kembali ke detail</a>
@endsection
