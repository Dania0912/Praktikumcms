@extends('layouts.app')

@section('title', 'Detail Penggajian')

@section('content')
    <h2>Detail Penggajian</h2>

    <p><strong>ID Penggajian:</strong> {{ $penggajian->id }}</p>
    <p><strong>Gaji Pokok:</strong> {{ number_format($penggajian->Gaji_Pokok, 0, ',', '.') }}</p>
    <p><strong>Potongan:</strong> {{ number_format($penggajian->Potongan, 0, ',', '.') }}</p>
    <p><strong>Bonus:</strong> {{ number_format($penggajian->Bonus, 0, ',', '.') }}</p>
    <p><strong>Catatan:</strong> {{ $penggajian->Catatan }}</p>

    <br>

    <a href="{{ route('penggajian.edit', $penggajian->id) }}">✏️ Edit</a> |
    <form action="{{ route('penggajian.destroy', $penggajian->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger">🗑️ Hapus</button>
</form>


    <br><br>

    <a href="{{ route('penggajian.index') }}">← Kembali ke daftar</a>
@endsection
