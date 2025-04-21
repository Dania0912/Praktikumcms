@extends('layouts.app')

@section('content')
    <h1>Edit HR</h1>

    @if ($errors->any())
        <div style="color:red;">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form method="POST" action="{{ route('hr.update', $hr->ID_HR) }}">
        @csrf
        @method('PUT')

        <label>ID HR:</label><br>
        <input type="text" name="ID_HR" value="{{ $hr->ID_HR }}" readonly><br>

        <label>Nama:</label><br>
        <input type="text" name="Nama" value="{{ $hr->Nama }}"><br>

        <label>Jabatan:</label><br>
        <input type="text" name="Jabatan" value="{{ $hr->Jabatan }}"><br>

        <button type="submit">Simpan</button>
    </form>

    <a href="{{ route('hr.show', $hr->ID_HR) }}">← Kembali ke detail</a>
@endsection
