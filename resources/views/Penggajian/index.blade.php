@extends('layouts.app')

@section('content')
    <h1>Daftar Penggajian</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <a href="{{ route('penggajian.create') }}">➕ Tambah Penggajian</a>

    <ul>
        @foreach ($penggajian as $data)
            <li>
                <a href="{{ route('penggajian.show', $data->ID_Penggajian) }}">
                    {{ $data->ID_Penggajian }} - Gaji Pokok: {{ number_format($data->Gaji_Pokok, 0, ',', '.') }}
                </a>
            </li>
        @endforeach
    </ul>
@endsection
