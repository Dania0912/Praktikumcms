<h1>Daftar Cuti</h1>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<a href="{{ route('cuti.create') }}">➕ Tambah Cuti</a>

<ul>
    @foreach ($cuti as $data)
        <li><a href="{{ route('cuti.show', $data->ID_Cuti) }}">{{ $data->ID_Cuti }} - {{ $data->Keterangan_Cuti }}</a></li>
    @endforeach
</ul>
