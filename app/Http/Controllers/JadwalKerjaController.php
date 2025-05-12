<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\JadwalKerja;
use App\Models\Karyawan;
use Carbon\Carbon;

class JadwalKerjaController extends Controller
{
    // Menampilkan daftar semua 
    public function index()
    {
        return view('jadwalkerja.index', [
            'jadwalkerja' => JadwalKerja::all()
        ]);
    }

    // Menampilkan form tambah 
    public function create()
    {
        $karyawans = Karyawan::all();
        return view('jadwalkerja.create', compact('karyawans'));
    }

    // Menyimpan data 


    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id'     => 'required|exists:karyawan,id',
            'tanggal_mulai'   => 'required|date',
            'tanggal_selesai' => 'required|date',
            'waktu_mulai'     => 'required|date_format:H:i',
            'waktu_selesai'   => 'required|date_format:H:i',
        ]);
    
        DB::insert(
            'INSERT INTO "JADWALKERJA"
            ("KARYAWAN_ID", "TANGGAL_MULAI", "TANGGAL_SELESAI", "WAKTU_MULAI", "WAKTU_SELESAI", "UPDATED_AT", "CREATED_AT")
            VALUES (:karyawan_id, TO_DATE(:tanggal_mulai, \'YYYY-MM-DD\'), TO_DATE(:tanggal_selesai, \'YYYY-MM-DD\'), TO_DATE(:waktu_mulai, \'HH24:MI:SS\'), TO_DATE(:waktu_selesai, \'HH24:MI:SS\'), SYSDATE, SYSDATE)',
            [
                'karyawan_id'     => $request->input('karyawan_id'),
                'tanggal_mulai'   => Carbon::parse($request->input('tanggal_mulai'))->format('Y-m-d'),
                'tanggal_selesai' => Carbon::parse($request->input('tanggal_selesai'))->format('Y-m-d'),
                'waktu_mulai'     => Carbon::createFromFormat('H:i', $request->input('waktu_mulai'))->format('H:i:s'),
                'waktu_selesai'   => Carbon::createFromFormat('H:i', $request->input('waktu_selesai'))->format('H:i:s'),
            ]
        );
    
        return redirect()->route('jadwalkerja.index');
    }
    
    

    // Menampilkan detail 
    public function show($id)
    {
        $jadwalkerja = JadwalKerja::findOrFail($id);
        return view('jadwalkerja.show', compact('jadwalkerja'));
    }

    // Menampilkan form edit karyawan
    public function edit($id)
    {
        $jadwalkerja = JadwalKerja::findOrFail($id);
        return view('jadwalkerja.edit', compact('jadwalkerja'));
    }

    // Memproses update data karyawan
    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'waktu_mulai' => 'required|date_format:H:i',
            'waktu_selesai' => 'required|date_format:H:i',
        ]);

        $jadwalkerja = JadwalKerja::findOrFail($id);

        $jadwalkerja->update([
            'nama' => $request->input('nama'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'alamat' => $request->input('alamat'),
            'jabatan' => $request->input('jabatan'),
            'riwayat_pekerjaan' => $request->input('riwayat_pekerjaan'),
        ]);

        return redirect()->route('jadwalkerja.show', $id);
    }

    // Menampilkan halaman konfirmasi hapus
    public function delete($id)
    {
        $jadwalkerja = JadwalKerja::findOrFail($id);
        return view('jadwalkerja.delete', compact('jadwalkerja'));
    }

    // Menghapus data 
    public function destroy($id)
    {
        $jadwalkerja = JadwalKerja::findOrFail($id);
        $jadwalkerja->delete();

        return redirect()->route('jadwalkerja.index');
    }
}