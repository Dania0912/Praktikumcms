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
        $hrs = HR::all();
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
            'waktu_mulai'     => 'required|regex:/^\d{2}:\d{2}$/|date_format:H:i',
            'waktu_selesai'   => 'required|regex:/^\d{2}:\d{2}$/|date_format:H:i|after:waktu_mulai',
        ], [
            'karyawan_id.required' => 'Nama karyawan wajib dipilih.',
            'id_hrs.required' => 'HR yang bertanggung jawab wajib dipilih.',
            'tanggal_mulai.required' => 'Tanggal mulai wajib diisi.',
            'tanggal_mulai.date' => 'Format tanggal mulai tidak valid.',
            'tanggal_selesai.required' => 'Tanggal selesai wajib diisi.',
            'tanggal_selesai.date' => 'Format tanggal selesai tidak valid.',
            'tanggal_selesai.after_or_equal' => 'Tanggal selesai harus sama atau setelah tanggal mulai.',
            'waktu_mulai.required' => 'Waktu mulai wajib diisi.',
            'waktu_mulai.regex' => 'Format waktu mulai harus berupa jam dan menit (HH:MM).',
            'waktu_mulai.date_format' => 'Format waktu mulai tidak valid.',
            'waktu_selesai.required' => 'Waktu selesai wajib diisi.',
            'waktu_selesai.regex' => 'Format waktu selesai harus berupa jam dan menit (HH:MM).',
            'waktu_selesai.date_format' => 'Format waktu selesai tidak valid.',
            'waktu_selesai.after' => 'Waktu selesai harus setelah waktu mulai.',
        ]);

        DB::insert("
            INSERT INTO JADWALKERJA (
                KARYAWAN_ID, ID_HRS, TANGGAL_MULAI, TANGGAL_SELESAI, 
                WAKTU_MULAI, WAKTU_SELESAI, CREATED_AT, UPDATED_AT
            )
            VALUES (
                :karyawan_id, :id_hrs, TO_DATE(:tanggal_mulai, 'YYYY-MM-DD'),
                TO_DATE(:tanggal_selesai, 'YYYY-MM-DD'),
                TO_DATE(:waktu_mulai, 'HH24:MI:SS'),
                TO_DATE(:waktu_selesai, 'HH24:MI:SS'),
                SYSDATE, SYSDATE
            )
        ", [
            'karyawan_id'     => $request->karyawan_id,
            'id_hrs'          => $request->id_hrs,
            'tanggal_mulai'   => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
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
            'waktu_mulai'     => 'required|regex:/^\d{2}:\d{2}$/|date_format:H:i',
            'waktu_selesai'   => 'required|regex:/^\d{2}:\d{2}$/|date_format:H:i|after:waktu_mulai',
        ], [
            'id_hrs.required' => 'HR wajib dipilih.',
            'tanggal_mulai.required' => 'Tanggal mulai wajib diisi.',
            'tanggal_mulai.date' => 'Format tanggal mulai tidak valid.',
            'tanggal_selesai.required' => 'Tanggal selesai wajib diisi.',
            'tanggal_selesai.date' => 'Format tanggal selesai tidak valid.',
            'tanggal_selesai.after_or_equal' => 'Tanggal selesai harus setelah atau sama dengan tanggal mulai.',
            'waktu_mulai.required' => 'Waktu mulai wajib diisi.',
            'waktu_mulai.regex' => 'Format waktu mulai harus HH:MM.',
            'waktu_mulai.date_format' => 'Format waktu mulai tidak sesuai.',
            'waktu_selesai.required' => 'Waktu selesai wajib diisi.',
            'waktu_selesai.regex' => 'Format waktu selesai harus HH:MM.',
            'waktu_selesai.date_format' => 'Format waktu selesai tidak sesuai.',
            'waktu_selesai.after' => 'Waktu selesai harus setelah waktu mulai.',
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
            'id_hrs'          => $request->input('id_hrs'),
            'tanggal_mulai'   => $request->input('tanggal_mulai'),
            'tanggal_selesai' => $request->input('tanggal_selesai'),
            'waktu_mulai'     => date('H:i:s', strtotime($request->input('waktu_mulai'))),
            'waktu_selesai'   => date('H:i:s', strtotime($request->input('waktu_selesai'))),
            'id'              => $id,
        ]);

        return redirect()->route('jadwalkerja.show', $id)->with('success', 'Data berhasil diperbarui');
    }

    // Menampilkan halaman konfirmasi hapus
    public function delete($id)
    {
        $jadwalkerja = JadwalKerja::with(['karyawan', 'hrs'])->findOrFail($id);
        return view('jadwalkerja.delete', compact('jadwalkerja'));
    }

    // Menghapus data jadwal kerja
    public function destroy($id)
    {
        $jadwalkerja = JadwalKerja::findOrFail($id);
        $jadwalkerja->delete();

        return redirect()->route('jadwalkerja.index')->with('success', 'Data jadwal kerja berhasil dihapus');
    }
}
