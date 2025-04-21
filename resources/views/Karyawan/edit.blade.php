<h1>Edit Karyawan</h1>

@if ($errors->any())
    <div style="color:red;">
        <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
    </div>
@endif

<form method="POST" action="{{ route('karyawan.update', $karyawan->ID_Karyawan) }}">
    @csrf
    @method('PUT')

    <label>ID Karyawan:</label><br>
    <input type="text" name="ID_Karyawan" value="{{ $karyawan->ID_Karyawan }}" readonly><br>

    <label>Nama:</label><br>
    <input type="text" name="Nama" value="{{ $karyawan->Nama }}"><br>

    <label>Tanggal Lahir:</label><br>
    <input type="date" name="Tanggal_Lahir" value="{{ $karyawan->Tanggal_Lahir }}"><br>

    <label>Alamat:</label><br>
    <input type="text" name="Alamat" value="{{ $karyawan->Alamat }}"><br>

    <label>Jabatan:</label><br>
    <input type="text" name="Jabatan" value="{{ $karyawan->Jabatan }}"><br>

    <label>Riwayat Pekerjaan:</label><br>
    <input type="text" name="Riwayat_Pekerjaan" value="{{ $karyawan->Riwayat_Pekerjaan }}"><br>

    <button type="submit">Simpan</button>
</form>

<a href="{{ route('karyawan.show', $karyawan->ID_Karyawan) }}">← Kembali ke detail</a>
