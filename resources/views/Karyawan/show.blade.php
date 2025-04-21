<h1>{{ $karyawan->Nama }}</h1>

<p><strong>ID:</strong> {{ $karyawan->ID_Karyawan }}</p>
<p><strong>Tanggal Lahir:</strong> {{ $karyawan->Tanggal_Lahir }}</p>
<p><strong>Alamat:</strong> {{ $karyawan->Alamat }}</p>
<p><strong>Jabatan:</strong> {{ $karyawan->Jabatan }}</p>
<p><strong>Riwayat Pekerjaan:</strong> {{ $karyawan->Riwayat_Pekerjaan }}</p>

<a href="{{ route('karyawan.edit', $karyawan->ID_Karyawan) }}">✏️ Edit</a> |
<a href="{{ route('karyawan.confirmDelete', $karyawan->ID_Karyawan) }}">🗑️ Hapus</a><br>
<a href="{{ route('karyawan.index') }}">← Kembali ke daftar</a>
