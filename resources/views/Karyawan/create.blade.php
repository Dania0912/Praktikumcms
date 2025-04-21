<h1>Tambah Karyawan</h1>

@if ($errors->any())
    <div style="color:red;">
        <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
    </div>
@endif

<form method="POST" action="{{ route('karyawan.store') }}">
    @csrf

    <label>ID Karyawan:</label><br>
    <input type="text" name="ID_Karyawan"><br>

    <label>Nama:</label><br>
    <input type="text" name="Nama"><br>

    <label>Tanggal Lahir:</label><br>
    <input type="date" name="Tanggal_Lahir"><br>

    <label>Alamat:</label><br>
    <input type="text" name="Alamat"><br>

    <label>Jabatan:</label><br>
    <input type="text" name="Jabatan"><br>

    <label>Riwayat Pekerjaan:</label><br>
    <input type="text" name="Riwayat_Pekerjaan"><br>

    <button type="submit">Simpan</button>
</form>

<a href="{{ route('karyawan.index') }}">← Kembali ke daftar</a>
