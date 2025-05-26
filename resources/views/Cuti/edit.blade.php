@extends('layouts.app')

@section('title', 'Edit Cuti')

@section('content')
<div class="container">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-warning text-dark">
            <h4 class="mb-0">Edit Cuti</h4>
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

            <form method="POST" action="{{ route('cuti.update', $cuti->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                    <input type="date" name="tanggal_mulai" class="form-control" value="{{ $cuti->tanggal_mulai }}" required>
                    @error('tanggal_mulai')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
                    <input type="date" name="tanggal_selesai" class="form-control" value="{{ $cuti->tanggal_selesai }}" required>
                    @error('tanggal_selesai')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="keterangan_cuti" class="form-label">Keterangan Cuti</label>
                    <input type="text" name="keterangan_cuti" class="form-control" value="{{ $cuti->keterangan_cuti }}" required>
                    @error('keterangan_cuti')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="id_hrs" class="form-label">HR</label>
                    <select name="id_hrs" id="id_hrs" class="form-control" required>
                        @foreach($hrs as $hr)
                            <option value="{{ $hr->id }}" {{ $cuti->id_hrs == $hr->id ? 'selected' : '' }}>
                                {{ $hr->nama }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_hrs')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('cuti.show', $cuti->id) }}" class="btn btn-secondary">
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