@extends('layouts.app')

@section('title', 'Tambah Cuti')

@section('content')
<div class="container">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Form Tambah Cuti</h4>
        </div>

        <div class="card-body">

            {{-- Notifikasi --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @elseif (session('errors'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('errors') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{-- Validasi --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('cuti.store') }}">
                @csrf

                <div class="mb-3">
                    <label for="karyawan_id" class="form-label">Nama Karyawan</label>
                    <select name="karyawan_id" id="karyawan_id" class="form-control" required>
                        <option value="" disabled selected>-- Pilih Karyawan --</option>
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
                    <label for="id_hrs" class="form-label">Nama HR</label>
                    <select name="id_hrs" id="id_hrs" class="form-control" required>
                        <option value="" disabled selected>-- Pilih HR --</option>
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
                    <label for="keterangan_cuti" class="form-label">Keterangan Cuti</label>
                    <textarea name="keterangan_cuti" class="form-control" rows="3" required>{{ old('keterangan_cuti') }}</textarea>
                    @error('keterangan_cuti')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('cuti.index') }}" class="btn btn-secondary">← Kembali</a>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-1"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
