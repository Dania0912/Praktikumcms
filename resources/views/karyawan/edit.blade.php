<h1>Edit Karyawan</h1>

@if ($errors->any())
    <div style="color:red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('karyawan.update', $karyawan->ID_Karyawan) }}">
    @csrf
    @method('PUT')

    <label>ID Karyawan:</label><br>
    <input type="text" name="ID_Karyawan" value="{{ $karyawan->ID_Karyawan }}"><br>

    <label>Nama:</label><br>
    <input type="text" name="Nama" value="{{ $karyawan->Nama }}"><br>

    <label>Tanggal Lahir:</label><br>
    <input type="date" name="Tanggal_Lahir" value="{{ \Carbon\Carbon::parse($karyawan->Tanggal_Lahir)->format('Y-m-d') }}"><br>

    <label>Alamat:</label><br>
    <textarea name="Alamat">{{ $karyawan->Alamat }}</textarea><br>

    <label>Jabatan:</label><br>
    <input type="text" name="Jabatan" value="{{ $karyawan->Jabatan }}"><br>

    <label>Riwayat Pekerjaan:</label><br>
    <textarea name="Riwayat_Pekerjaan">{{ $karyawan->Riwayat_Pekerjaan }}</textarea><br>

    <button type="submit">Simpan</button>
</form>

<a href="{{ route('karyawan.show', $karyawan->ID_Karyawan) }}">← Kembali ke detail</a>
