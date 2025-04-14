<h1>Tambah Karyawan</h1>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ url('/karyawan') }}">
        @csrf
        <label>ID Karyawan:</label><br>
        <input type="text" name="ID_Karyawan" value="{{ old('ID_Karyawan') }}"><br>

        <label>Nama:</label><br>
        <input type="text" name="Nama" value="{{ old('Nama') }}"><br>

        <label>Tanggal Lahir:</label><br>
        <input type="date" name="Tanggal_Lahir" value="{{ old('Tanggal_Lahir') }}"><br>

        <label>Alamat:</label><br>
        <textarea name="Alamat">{{ old('Alamat') }}</textarea><br>

        <label>Jabatan:</label><br>
        <input type="text" name="Jabatan" value="{{ old('Jabatan') }}"><br>

        <label>Riwayat Pekerjaan:</label><br>
        <textarea name="Riwayat_Pekerjaan">{{ old('Riwayat_Pekerjaan') }}</textarea><br>

        <button type="submit">Simpan</button>
    </form>

    <a href="{{ url('/karyawan') }}">← Kembali</a>