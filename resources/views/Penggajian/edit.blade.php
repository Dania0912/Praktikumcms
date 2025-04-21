@extends('layouts.app')

@section('content')
    <h1>Edit Penggajian</h1>

    @if ($errors->any())
        <div style="color:red;">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form method="POST" action="{{ route('penggajian.update', $penggajian->ID_Penggajian) }}">
        @csrf
        @method('PUT')

        <label>ID Penggajian:</label><br>
        <input type="text" name="ID_Penggajian" value="{{ $penggajian->ID_Penggajian }}" readonly><br>

        <label>Gaji Pokok:</label><br>
        <input type="text" name="Gaji_Pokok" value="{{ $penggajian->Gaji_Pokok }}"><br>

        <label>Potongan:</label><br>
        <input type="text" name="Potongan" value="{{ $penggajian->Potongan }}"><br>

        <label>Bonus:</label><br>
        <input type="text" name="Bonus" value="{{ $penggajian->Bonus }}"><br>

        <label>Catatan:</label><br>
        <textarea name="Catatan">{{ $penggajian->Catatan }}</textarea><br>

        <button type="submit">Simpan</button>
    </form>

    <a href="{{ route('penggajian.show', $penggajian->ID_Penggajian) }}">← Kembali ke detail</a>
@endsection
