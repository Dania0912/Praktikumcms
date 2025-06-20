@extends('layouts.app')

@section('content')
    <h1>Tambah Cuti</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('cuti.store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label for="karyawan_id">Karyawan</label>
            <select name="karyawan_id" id="karyawan_id" class="form-control" required>
                @foreach($karyawans as $karyawan)
                    <option value="{{ $karyawan->id }}" {{ old('karyawan_id') == $karyawan->id ? 'selected' : '' }}>
                        {{ $karyawan->nama }}
                    </option>
                @endforeach
            </select>
            @error('karyawan_id')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="id_hrs">HR</label>
            <select name="id_hrs" id="id_hrs" class="form-control" required>
                @foreach($hrs as $hr)
                    <option value="{{ $hr->id }}" {{ old('id_hrs') == $hr->id ? 'selected' : '' }}>
                        {{ $hr->nama }}
                    </option>
                @endforeach
            </select>
            @error('id_hrs')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="tanggal_mulai">Tanggal Mulai</label>
            <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control" value="{{ old('tanggal_mulai') }}" required>
            @error('tanggal_mulai')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="tanggal_selesai">Tanggal Selesai</label>
            <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="form-control" value="{{ old('tanggal_selesai') }}" required>
            @error('tanggal_selesai')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="keterangan_cuti">Keterangan Cuti</label>
            <textarea name="keterangan_cuti" id="keterangan_cuti" class="form-control" rows="3">{{ old('keterangan_cuti') }}</textarea>
            @error('keterangan_cuti')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

    <a href="{{ route('cuti.index') }}" class="btn btn-secondary mt-3">← Kembali ke daftar</a>
@endsection