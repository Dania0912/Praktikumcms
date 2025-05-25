@extends('layouts.app')

@section('title', 'Edit Jadwal Kerja')

@section('content')
<div class="container">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-warning text-dark">
            <h4 class="mb-0">Edit Jadwal Kerja</h4>
        </div>

        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('jadwalkerja.update', $jadwalkerja->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="karyawan_id" class="form-label">Nama Karyawan</label>
                    <select name="karyawan_id" class="form-select" required disabled>
                        @foreach($karyawans as $karyawan)
                            <option value="{{ $karyawan->id }}" {{ $jadwalkerja->karyawan_id == $karyawan->id ? 'selected' : '' }}>
                                {{ $karyawan->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="id_hrs" class="form-label">HR</label>
                    <select name="id_hrs" class="form-select" required>
                        @foreach($hrs as $hr)
                            <option value="{{ $hr->id }}" {{ $jadwalkerja->id_hrs == $hr->id ? 'selected' : '' }}>
                                {{ $hr->nama }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_hrs')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                        <input type="date" name="tanggal_mulai" class="form-control" value="{{ old('tanggal_mulai', $jadwalkerja->tanggal_mulai->format('Y-m-d')) }}" required>
                        @error('tanggal_mulai')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
                        <input type="date" name="tanggal_selesai" class="form-control" value="{{ old('tanggal_selesai', $jadwalkerja->tanggal_selesai->format('Y-m-d')) }}" required>
                        @error('tanggal_selesai')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="waktu_mulai" class="form-label">Waktu Mulai</label>
                        <input type="time" name="waktu_mulai" class="form-control" value="{{ old('waktu_mulai', $jadwalkerja->waktu_mulai) }}" required>
                        @error('waktu_mulai')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="waktu_selesai" class="form-label">Waktu Selesai</label>
                        <input type="time" name="waktu_selesai" class="form-control" value="{{ old('waktu_selesai', $jadwalkerja->waktu_selesai) }}" required>
                        @error('waktu_selesai')
                            <div class="text-danger small">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('jadwalkerja.show', $jadwalkerja->id) }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-save me-1"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
