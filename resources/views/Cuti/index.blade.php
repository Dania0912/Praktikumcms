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
                        <div>
                            <strong>{{ \Carbon\Carbon::parse($c->tanggal_mulai)->translatedFormat('l, d M Y') }}</strong><br>
                            <small>{{ $c->keterangan_cuti }} — {{ $c->tanggal_selesai }}</small><br>
                            <small class="text-muted">{{ $c->karyawan->nama ?? 'Tanpa Nama Karyawan' }}</small>
                        </div>
                        <div>
                            <a href="{{ route('cuti.edit', $c->id) }}" class="btn btn-warning btn-sm me-1">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                            <a href="{{ route('cuti.show', $c->id) }}" class="btn btn-info btn-sm me-1">
                                <i class="bi bi-eye"></i> Detail
                            </a>
                            <a href="{{ route('cuti.delete', $c->id) }}" class="btn btn-danger btn-sm">
                                <i class="bi bi-trash"></i> Hapus
                            </a>


                        </div>
                    </li>
                @empty
                    <li class="list-group-item text-center text-muted">Tidak ada data cuti.</li>
                @endforelse
            </ul>
        </div>
    </div>
@endsection