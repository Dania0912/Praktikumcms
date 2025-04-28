@extends('layouts.app')

@section('content')
    <h1>Tambah HR</h1>

    @if ($errors->any())
        <div style="color:red;">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form method="POST" action="{{ route('hr.store') }}">
        @csrf

        <label>ID HR:</label><br>
        <input type="text" name="ID_HR"><br>

        <label>Nama:</label><br>
        <input type="text" name="Nama"><br>

        <label>Jabatan:</label><br>
        <input type="text" name="Jabatan"><br>

        <button type="submit">Simpan</button>
    </form>

    <a href="{{ route('hr.index') }}">← Kembali ke daftar</a>
@endsection