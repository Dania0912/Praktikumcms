@extends('layouts.app')

@section('title', 'Edit Penggajian')

@section('content')
<div class="container">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-warning text-dark">
            <h4 class="mb-0">Edit Penggajian</h4>
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

            <form method="POST" action="{{ route('penggajian.update', $penggajian->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="gaji_pokok" class="form-label">Gaji Pokok</label>
                    <input type="number" name="gaji_pokok" class="form-control" value="{{ $penggajian->gaji_pokok }}" required>
                </div>

                <div class="mb-3">
                    <label for="potongan" class="form-label">Potongan</label>
                    <input type="number" name="potongan" class="form-control" value="{{ $penggajian->potongan }}">
                </div>

                <div class="mb-3">
                    <label for="bonus" class="form-label">Bonus</label>
                    <input type="number" name="bonus" class="form-control" value="{{ $penggajian->bonus }}">
                </div>

                <div class="mb-4">
                    <label for="catatan" class="form-label">Catatan</label>
                    <textarea name="catatan" class="form-control" rows="3">{{ $penggajian->catatan }}</textarea>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('penggajian.show', $penggajian->id) }}" class="btn btn-secondary">
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
