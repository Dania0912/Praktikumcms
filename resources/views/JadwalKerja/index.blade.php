@extends('layouts.app')

@section('title', 'Daftar Jadwal Kerja')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Daftar Jadwal Kerja</h2>
        <a href="{{ route('jadwalkerja.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Tambah Jadwal Kerja
        </a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>ID Jadwal</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th>Waktu Mulai</th>
                            <th>Waktu Selesai</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($jadwalKerjas as $jadwal)
                            <tr>
                                <td>{{ $jadwal->id_jadwal }}</td>
                                <td>{{ $jadwal->tanggal_mulai }}</td>
                                <td>{{ $jadwal->tanggal_selesai }}</td>
                                <td>{{ $jadwal->waktu_mulai }}</td>
                                <td>{{ $jadwal->waktu_selesai }}</td>
                                <td>
                                    <a href="{{ route('jadwalkerja.show', $jadwal->id_jadwal) }}" class="btn btn-sm btn-info text-white">
                                        <i class="bi bi-eye"></i> Lihat
                                    </a>
                                    <a href="{{ route('jadwalkerja.edit', $jadwal->id_jadwal) }}" class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <!-- Delete Form with Confirmation -->
                                    <form action="{{ route('jadwalkerja.destroy', $jadwal->id_jadwal) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">Belum ada data jadwal kerja</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
