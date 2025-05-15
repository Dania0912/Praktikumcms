@extends('layouts.app')

@section('title', 'Tambah Karyawan')

@section('content')
<div class="container">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Tambah Karyawan Baru</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('karyawan.store') }}">
                @csrf

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" name="alamat" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="jabatan" class="form-label">Jabatan</label>
                    <input type="text" name="jabatan" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="riwayat_pekerjaan" class="form-label">Riwayat Pekerjaan</label>
                    <input type="text" name="riwayat_pekerjaan" class="form-control" required>
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
                    <a href="{{ route('karyawan.index') }}" class="btn btn-secondary">
                        ← Kembali ke daftar
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-1"></i> Simpan Karyawan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
