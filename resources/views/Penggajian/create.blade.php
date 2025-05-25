@extends('layouts.app')

@section('title', 'Tambah Penggajian')

@section('content')
<div class="container">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Tambah Data Penggajian</h4>
        </div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('penggajian.store') }}">
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
                    <label for="id_hrs" class="form-label">HR</label>
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
                    <label for="gaji_pokok" class="form-label">Gaji Pokok</label>
                    <input type="number" name="gaji_pokok" class="form-control" value="{{ old('gaji_pokok') }}" required>
                    @error('gaji_pokok')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="potongan" class="form-label">Potongan</label>
                    <input type="number" name="potongan" class="form-control" value="{{ old('potongan', 0) }}">
                    @error('potongan')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="bonus" class="form-label">Bonus</label>
                    <input type="number" name="bonus" class="form-control" value="{{ old('bonus', 0) }}">
                    @error('bonus')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="catatan" class="form-label">Catatan</label>
                    <input type="text" name="catatan" class="form-control" value="{{ old('catatan') }}">
                    @error('catatan')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('penggajian.index') }}" class="btn btn-secondary">← Kembali ke daftar</a>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-1"></i> Simpan Penggajian
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
