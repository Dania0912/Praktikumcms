@extends('layouts.app')

@section('title', 'Daftar Cuti')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Daftar Cuti</h2>
        <a href="{{ route('cuti.create') }}" class="btn btn-success">
            <i class="bi bi-calendar-plus me-1"></i> Tambah Cuti
        </a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <ul class="list-group">
                @forelse($cuti as $c)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a href="{{ route('cuti.show', $c->id) }}" class="text-decoration-none">
                            {{ $c->keterangan_cuti }} ({{ $c->tanggal_mulai }} s/d {{ $c->tanggal_selesai }})
                        </a>
                        <div>
                            <a href="{{ route('cuti.edit', $c->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <a href="{{ route('cuti.show', $c->id) }}" class="btn btn-info btn-sm">Detail</a>
                        </div>
                    </li>
                @empty
                    <li class="list-group-item text-center text-muted">Tidak ada data cuti.</li>
                @endforelse
            </ul>
        </div>
    </div>
@endsection
