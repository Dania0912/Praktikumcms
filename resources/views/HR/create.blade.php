@extends('layouts.app')

@section('content')
    <h1>Tambah HR</h1>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('hr.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="jabatan">Jabatan</label>
            <input type="text" name="jabatan" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

    <a href="{{ route('hr.index') }}" class="btn btn-secondary mt-3">← Kembali ke daftar</a>
@endsection
