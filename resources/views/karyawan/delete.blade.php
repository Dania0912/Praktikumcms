<h1>Yakin ingin menghapus data ini?</h1>

<p><strong>{{ $karyawan->Nama }}</strong></p>
<p>{{ $karyawan->Jabatan }}</p>

<form method="POST" action="{{ route('karyawan.destroy', $karyawan->ID_Karyawan) }}">
    @csrf
    @method('DELETE')
    <button type="submit">Ya, hapus</button>
</form>

<a href="{{ route('karyawan.show', $karyawan->ID_Karyawan) }}">← Batal</a>
