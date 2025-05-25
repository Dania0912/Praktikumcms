@extends('layouts.app')

@section('content')
    <h1>Tambah Jadwal Kerja</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('jadwalkerja.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="karyawan_id" class="form-label">Karyawan</label>
            <select name="karyawan_id" id="karyawan_id" class="form-select" required>
                <option value="" disabled {{ old('karyawan_id') ? '' : 'selected' }}>-- Pilih Karyawan --</option>
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

        <div class="mb-3">
            <label for="id_hrs" class="form-label">HR</label>
            <select name="id_hrs" id="id_hrs" class="form-select" required>
                <option value="" disabled {{ old('id_hrs') ? '' : 'selected' }}>-- Pilih HR --</option>
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

        <div class="mb-3">
            <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
            <input type="date" name="tanggal_mulai" class="form-control" value="{{ old('tanggal_mulai') }}" required>
            @error('tanggal_mulai')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
            <input type="date" name="tanggal_selesai" class="form-control" value="{{ old('tanggal_selesai') }}" required>
            @error('tanggal_selesai')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="waktu_mulai" class="form-label">Waktu Mulai</label>
            <input type="time" name="waktu_mulai" class="form-control" value="{{ old('waktu_mulai') }}" required>
            @error('waktu_mulai')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="waktu_selesai" class="form-label">Waktu Selesai</label>
            <input type="time" name="waktu_selesai" class="form-control" value="{{ old('waktu_selesai') }}" required>
            @error('waktu_selesai')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

    <a href="{{ route('jadwalkerja.index') }}" class="btn btn-secondary mt-3">← Kembali ke daftar Jadwal Kerja</a>
@endsection
