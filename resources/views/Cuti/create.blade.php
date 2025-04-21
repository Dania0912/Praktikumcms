<h1>Tambah Data Cuti</h1>

@if ($errors->any())
    <div style="color:red;">
        <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
    </div>
@endif

<form method="POST" action="{{ route('cuti.store') }}">
    @csrf

    <label>ID Cuti:</label><br>
    <input type="text" name="ID_Cuti"><br>

    <label>Tanggal Mulai:</label><br>
    <input type="date" name="Tanggal_Mulai"><br>

    <label>Tanggal Selesai:</label><br>
    <input type="date" name="Tanggal_Selesai"><br>

    <label>Keterangan Cuti:</label><br>
    <input type="text" name="Keterangan_Cuti"><br>

    <button type="submit">Simpan</button>
</form>

<a href="{{ route('cuti.index') }}">← Kembali</a>
