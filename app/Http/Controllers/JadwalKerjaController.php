<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalKerja;
use App\Models\Karyawan;
use App\Models\HR;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class JadwalKerjaController extends Controller
{
    // Menampilkan daftar semua jadwal kerja
    public function index()
    {
        return view('jadwalkerja.index', [
            'jadwalkerja' => JadwalKerja::all()
        ]);
    }

    // Menampilkan form tambah jadwal kerja
    public function create()
    {
        $karyawans = Karyawan::all();
        $hrs = HR::all(); // Ambil data HR untuk dropdown
        return view('jadwalkerja.create', compact('karyawans', 'hrs'));
    }

    // Menyimpan data jadwal kerja baru
    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id'     => 'required|exists:karyawan,id',
            'id_hrs'          => 'required|exists:HRS,id',
            'tanggal_mulai'   => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'waktu_mulai'     => 'required|date_format:H:i',
            'waktu_selesai'   => 'required|date_format:H:i|after:waktu_mulai',
        ]);

        // Simpan data dengan query manual agar TO_DATE() bisa dipakai untuk Oracle
        DB::insert("
            INSERT INTO JADWALKERJA (KARYAWAN_ID, ID_HRS, TANGGAL_MULAI, TANGGAL_SELESAI, WAKTU_MULAI, WAKTU_SELESAI, CREATED_AT, UPDATED_AT)
            VALUES (:karyawan_id, :id_hrs, TO_DATE(:tanggal_mulai, 'YYYY-MM-DD'), TO_DATE(:tanggal_selesai, 'YYYY-MM-DD'), TO_DATE(:waktu_mulai, 'HH24:MI:SS'), TO_DATE(:waktu_selesai, 'HH24:MI:SS'), SYSDATE, SYSDATE)
        ", [
            'karyawan_id'     => $request->karyawan_id,
            'id_hrs'          => $request->id_hrs,
            'tanggal_mulai'   => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            // Format waktu lengkap HH:mm:ss agar TO_DATE valid
            'waktu_mulai'     => Carbon::parse($request->waktu_mulai)->format('H:i:s'),
            'waktu_selesai'   => Carbon::parse($request->waktu_selesai)->format('H:i:s'),
        ]);

        return redirect()->route('jadwalkerja.index')->with('success', 'Jadwal kerja berhasil ditambahkan');
    }

    // Menampilkan detail jadwal kerja
    public function show($id)
    {
        $jadwalkerja = JadwalKerja::findOrFail($id);
        return view('jadwalkerja.show', compact('jadwalkerja'));
    }

    // Menampilkan form edit jadwal kerja
    public function edit($id)
    {
        $jadwalkerja = JadwalKerja::findOrFail($id);
        $karyawans = Karyawan::all();
        $hrs = HR::all();
        return view('jadwalkerja.edit', compact('jadwalkerja', 'karyawans', 'hrs'));
    }

    // Memproses update data jadwal kerja
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_hrs'          => 'required|exists:HRS,id',
            'tanggal_mulai'   => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'waktu_mulai'     => 'required|date_format:H:i',
            'waktu_selesai'   => 'required|date_format:H:i|after:waktu_mulai',
        ]);

        DB::statement("
            UPDATE JADWALKERJA 
            SET 
                ID_HRS = :id_hrs,
                TANGGAL_MULAI = TO_DATE(:tanggal_mulai, 'YYYY-MM-DD'),
                TANGGAL_SELESAI = TO_DATE(:tanggal_selesai, 'YYYY-MM-DD'),
                WAKTU_MULAI = TO_DATE(:waktu_mulai, 'HH24:MI:SS'),
                WAKTU_SELESAI = TO_DATE(:waktu_selesai, 'HH24:MI:SS'),
                UPDATED_AT = SYSDATE
            WHERE ID = :id
        ", [
            'id_hrs'         => $request->input('id_hrs'),
            'tanggal_mulai'  => $request->input('tanggal_mulai'),
            'tanggal_selesai'=> $request->input('tanggal_selesai'),
            'waktu_mulai'    => date('H:i:s', strtotime($request->input('waktu_mulai'))),
            'waktu_selesai'  => date('H:i:s', strtotime($request->input('waktu_selesai'))),
            'id'             => $id,
        ]);

        return redirect()->route('jadwalkerja.show', $id)->with('success', 'Data berhasil diupdate');
    }

    // Menampilkan halaman konfirmasi hapus
    public function delete($id)
    {
        $jadwalkerja = JadwalKerja::findOrFail($id);
        return view('jadwalkerja.delete', compact('jadwalkerja'));
    }

    // Menghapus data jadwal kerja
    public function destroy($id)
    {
        $jadwalkerja = JadwalKerja::findOrFail($id);
        $jadwalkerja->delete();

        return redirect()->route('jadwalkerja.index');
    }
}
// test update 26 Mei