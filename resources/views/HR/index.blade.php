@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar HR</h1>
    <a href="{{ route('hr.create') }}" class="btn btn-success mb-3">Tambah HR</a>

    <table class="table table-striped table-bordered">
        <thead>
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
                    <a href="{{ route('hr.edit', $data->ID_HR) }}" class="btn btn-primary btn-sm">Edit</a>
                    <a href="{{ route('hr.show', $data->ID_HR) }}" class="btn btn-info btn-sm">Detail</a>

                    <!-- Delete Form -->
                    <form action="{{ route('hr.destroy', $data->ID_HR) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
