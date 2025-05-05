<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalKerja;

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
        return view('jadwalkerja.create');
    }

    // Menyimpan data 
    public function store(Request $request)
    {
        $request->validate([
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',
            'waktu_mulai' => 'required|date_format:H:i',
            'waktu_selesai' => 'required|date_format:H:i',
        ]);

        JadwalKerja::create([
            'tanggal_mulai' => $request->input('tanggal_mulai'),
            'tanggal_selesai' => $request->input('tanggal_selesai'),
            'waktu_mulai' => $request->input('waktu_mulai'),
            'waktu_selesai' => $request->input('waktu_selesai'),

        ]);
 
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