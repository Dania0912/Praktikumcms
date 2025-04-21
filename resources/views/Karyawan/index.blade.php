<h1>Daftar Karyawan</h1>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<a href="{{ route('karyawan.create') }}">➕ Tambah Karyawan</a>

<ul>
    @foreach ($karyawan as $data)
        <li><a href="{{ route('karyawan.show', $data->ID_Karyawan) }}">{{ $data->Nama }}</a></li>
    @endforeach
</ul>
