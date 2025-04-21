<h1>Hapus Karyawan</h1>

<p>Apakah Anda yakin ingin menghapus <strong>{{ $karyawan->Nama }}</strong>?</p>

<form method="POST" action="{{ route('karyawan.destroy', $karyawan->ID_Karyawan) }}">
    @csrf
    @method('DELETE')

    <button type="submit">🗑️ Hapus</button>
</form>

<a href="{{ route('karyawan.index') }}">← Batal</a>
