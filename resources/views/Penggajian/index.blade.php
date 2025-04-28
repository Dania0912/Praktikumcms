@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="fw-bold">{{ $pageTitle }}</h2>
    <a href="{{ $createRoute }}" class="btn btn-primary">
        <i class="bi bi-plus-circle me-1"></i> Tambah {{ $pageTitle }}
    </a>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        @foreach($columns as $col)
                            <th>{{ $col }}</th>
                        @endforeach
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($data as $item)
                        <tr>
                            @foreach($fields as $field)
                                <td>{{ $field === 'Gaji_Pokok' || $field === 'Potongan' || $field === 'Bonus' ? number_format($item->$field, 0, ',', '.') : $item->$field }}</td>
                            @endforeach
                            <td>
                                <a href="{{ route($showRoute, $item->ID_Penggajian) }}" class="btn btn-sm btn-info text-white"><i class="bi bi-eye"></i></a>
                                <a href="{{ route($editRoute, $item->ID_Penggajian) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                                <a href="{{ route($confirmDeleteRoute, $item->ID_Penggajian) }}" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="{{ count($columns)+1 }}" class="text-center text-muted">Belum ada data penggajian</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
