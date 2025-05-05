@extends('layouts.app')

@section('title', 'Edit Penggajian')

@section('content')
    <h1>Edit Penggajian</h1>

    @if ($errors->any())
        <div style="color:red;">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form method="POST" action="{{ route('penggajian.update', $penggajian->id) }}">
        @csrf
        @method('PUT')

        <label>Gaji Pokok:</label><br>
        <input type="number" name="gaji_pokok" value="{{ $penggajian->gaji_pokok }}" required><br><br>

        <label>Potongan:</label><br>
        <input type="number" name="potongan" value="{{ $penggajian->potongan }}"><br><br>

        <label>Bonus:</label><br>
        <input type="number" name="bonus" value="{{ $penggajian->bonus }}"><br><br>

        <label>Catatan:</label><br>
        <textarea name="catatan">{{ $penggajian->catatan }}</textarea><br><br>

        <button style="margin-top: 10px;">Simpan</button>
    </form>

    <br>
    <a href="{{ route('penggajian.show', $penggajian->id) }}">← Kembali ke detail</a>
@endsection
