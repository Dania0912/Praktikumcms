@extends('layouts.app')

@section('content')
    <h1>Edit HR</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('hr.update', $hr->ID_HR) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="ID_HR">ID HR</label>
            <input type="text" name="ID_HR" class="form-control" value="{{ $hr->ID_HR }}" readonly>
        </div>
        <div class="form-group">
            <label for="Nama">Nama</label>
            <input type="text" name="Nama" class="form-control" value="{{ $hr->Nama }}" required>
        </div>
        <div class="form-group">
            <label for="Jabatan">Jabatan</label>
            <input type="text" name="Jabatan" class="form-control" value="{{ $hr->Jabatan }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('hr.show', $hr->ID_HR) }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
