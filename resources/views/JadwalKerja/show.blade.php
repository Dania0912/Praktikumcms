@if ($jadwalKerja)
    <h1>Jadwal Kerja: {{ $jadwalKerja->ID_Jadwal }}</h1>
    <p><strong>Tanggal Mulai:</strong> {{ $jadwalKerja->Tanggal_Mulai }}</p>
    <p><strong>Tanggal Selesai:</strong> {{ $jadwalKerja->Tanggal_Selesai }}</p>
    <p><strong>Waktu Mulai:</strong> {{ $jadwalKerja->Waktu_Mulai }}</p>
    <p><strong>Waktu Selesai:</strong> {{ $jadwalKerja->Waktu_Selesai }}</p>

    <a href="{{ route('jadwalkerja.edit', $jadwalKerja->ID_Jadwal) }}">✏️ Edit</a> |
    <a href="{{ route('jadwalkerja.confirmDelete', $jadwalKerja->ID_Jadwal) }}">🗑️ Hapus</a><br>
@else
    <p style="color: red;">Data Jadwal Kerja tidak ditemukan.</p>
@endif

<a href="{{ route('jadwalkerja.index') }}">← Kembali ke daftar</a>
