@extends('layouts.app')

@section('title', 'Edit Karyawan')

@section('content')
<div class="container">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-warning text-dark">
            <h4 class="mb-0">Edit Karyawan</h4>
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

            <form action="{{ route('karyawan.update', $karyawan->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control" value="{{ $karyawan->nama }}" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="form-control" value="{{ $karyawan->tanggal_lahir }}" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" name="alamat" class="form-control" value="{{ $karyawan->alamat }}" required>
                </div>

                <div class="mb-3">
                    <label for="jabatan" class="form-label">Jabatan</label>
                    <input type="text" name="jabatan" class="form-control" value="{{ $karyawan->jabatan }}" required>
                </div>

                <div class="mb-3">
                    <label for="riwayat_pekerjaan" class="form-label">Riwayat Pekerjaan</label>
                    <input type="text" name="riwayat_pekerjaan" class="form-control" value="{{ $karyawan->riwayat_pekerjaan }}" required>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('karyawan.show', $karyawan->id) }}" class="btn btn-secondary">
                        Batal
                    </a>
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-save me-1"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
