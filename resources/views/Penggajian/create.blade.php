@extends('layouts.app')

@section('title', 'Tambah Penggajian')

@section('content')
<div class="container">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Tambah Data Penggajian</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('penggajian.store') }}">
                @csrf

                <div class="mb-3">
                    <label for="karyawan_id" class="form-label">Nama Karyawan</label>
                    <select name="karyawan_id" id="karyawan_id" class="form-control" required>
                        @foreach($karyawans as $karyawan)
                            <option value="{{ $karyawan->id }}">{{ $karyawan->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="id_hrs" class="form-label">HR</label>
                    <select name="id_hrs" id="id_hrs" class="form-control" required>
                        @foreach($hrs as $hr)
                            <option value="{{ $hr->id }}">{{ $hr->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="gaji_pokok" class="form-label">Gaji Pokok</label>
                    <input type="number" name="gaji_pokok" id="gaji_pokok" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="potongan" class="form-label">Potongan</label>
                    <input type="number" name="potongan" id="potongan" class="form-control" value="0">
                </div>

                <div class="mb-3">
                    <label for="bonus" class="form-label">Bonus</label>
                    <input type="number" name="bonus" id="bonus" class="form-control" value="0">
                </div>

                <div class="mb-3">
                    <label for="catatan" class="form-label">Catatan</label>
                    <input type="text" name="catatan" id="catatan" class="form-control">
                </div>

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="d-flex justify-content-between">
                    <a href="{{ route('penggajian.index') }}" class="btn btn-secondary">
                        ← Kembali ke daftar
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-1"></i> Simpan Penggajian
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
