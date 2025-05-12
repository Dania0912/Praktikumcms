@extends('layouts.app')

@section('title', 'Daftar Jadwal Kerja')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Daftar Jadwal Kerja</h2>
        <a href="{{ route('jadwalkerja.create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle me-1"></i> Tambah Jadwal Kerja
        </a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <ul class="list-group">
                @forelse($jadwalkerja as $jadwal)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <strong>{{ $jadwal->tanggal_mulai }} s.d {{ $jadwal->tanggal_selesai }}</strong><br>
                            <small>{{ $jadwal->waktu_mulai }} - {{ $jadwal->waktu_selesai }}</small>
                        </div>
                        <div>
                            <a href="{{ route('jadwalkerja.show', $jadwal->id) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('jadwalkerja.edit', $jadwal->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('jadwalkerja.destroy', $jadwal->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus jadwal ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </div>
                    </li>
                @empty
                    <li class="list-group-item text-center text-muted">Belum ada data jadwal kerja.</li>
                @endforelse
            </ul>
        </div>
    </div>
@endsection
