<h1>Daftar HR</h1>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<a href="{{ route('hr.create') }}">➕ Tambah HR</a>

<ul>
    @foreach ($hr as $data)
        <li><a href="{{ route('hr.show', $data->ID_HR) }}">{{ $data->Nama }}</a></li>
    @endforeach
</ul>
