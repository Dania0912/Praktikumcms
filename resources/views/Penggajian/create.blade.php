@extends('layouts.app')

@section('content')
    <h1>Tambah Penggajian</h1>

    @if ($errors->any())
        <div style="color:red;">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form method="POST" action="{{ route('penggajian.store') }}">
        @csrf

        <label>ID Penggajian:</label><br>
        <input type="text" name="ID_Penggajian"><br>

        <label>Gaji Pokok:</label><br>
        <input type="number" name="Gaji_Pokok"><br>

        <label>Potongan:</label><br>
        <input type="number" name="Potongan"><br>

        <label>Bonus:</label><br>
        <input type="number" name="Bonus"><br>

        <label>Catatan:</label><br>
        <textarea name="Catatan"></textarea><br>

        <button type="submit">Simpan</button>
    </form>

    <a href="{{ route('penggajian.index') }}">← Kembali ke daftar</a>
@endsection