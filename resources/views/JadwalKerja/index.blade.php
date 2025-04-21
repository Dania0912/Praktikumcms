<h1>Daftar Jadwal Kerja</h1>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<a href="{{ route('jadwalkerja.create') }}">➕ Tambah Jadwal</a>

<ul>
    @foreach ($jadwalKerja as $jadwal)
        <li>
            <a href="{{ route('jadwalkerja.show', $jadwal->ID_Jadwal) }}">
                {{ $jadwal->Tanggal_Mulai }} s.d. {{ $jadwal->Tanggal_Selesai }}
            </a>
        </li>
    @endforeach
</ul>
