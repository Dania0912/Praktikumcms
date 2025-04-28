@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">Daftar HR</h2>
    <a href="{{ route('hr.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle me-1"></i> Tambah HR
    </a>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>ID HR</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hr as $data)
                        <tr>
                            <td>{{ $data->ID_HR }}</td>
                            <td>{{ $data->Nama }}</td>
                            <td>{{ $data->Jabatan }}</td>
                            <td>
                                <a href="{{ route('hr.show', $data->ID_HR) }}" class="btn btn-sm btn-info text-white">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('hr.edit', $data->ID_HR) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <a href="{{ route('hr.confirmDelete', $data->ID_HR) }}" class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
