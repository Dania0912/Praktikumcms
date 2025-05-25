<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;

class KaryawanController extends Controller
{
    // Menampilkan daftar semua karyawan
    public function index()
    {
        return view('karyawan.index', [
            'karyawan' => Karyawan::all()
        ]);
    }

    // Menampilkan form tambah karyawan
    public function create()
    {
        return view('karyawan.create');
    }

    // Menyimpan data karyawan baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'riwayat_pekerjaan' => 'required|string|max:255',
        ]);

        Karyawan::create([
            'nama' => $request->input('nama'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'alamat' => $request->input('alamat'),
            'jabatan' => $request->input('jabatan'),
            'riwayat_pekerjaan' => $request->input('riwayat_pekerjaan'),
        ]);

        return redirect()->route('karyawan.index');
    }

    // Menampilkan detail karyawan
    public function show($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        return view('karyawan.show', compact('karyawan'));
    }

    // Menampilkan form edit karyawan
    public function edit($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        return view('karyawan.edit', compact('karyawan'));
    }

    // Memproses update data karyawan
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'riwayat_pekerjaan' => 'required|string|max:255',
        ]);

        $karyawan = Karyawan::findOrFail($id);

        $karyawan->update([
            'nama' => $request->input('nama'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'alamat' => $request->input('alamat'),
            'jabatan' => $request->input('jabatan'),
            'riwayat_pekerjaan' => $request->input('riwayat_pekerjaan'),
        ]);

        return redirect()->route('karyawan.show', $id);
    }

    // Menampilkan halaman konfirmasi hapus
    public function delete($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        return view('karyawan.delete', compact('karyawan'));
    }

    // Menghapus data karyawan
    public function destroy($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->delete();

        return redirect()->route('karyawan.index');
    }
}
// test update 26 Mei