<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    // Menampilkan daftar karyawan
    public function index()
    {
        $karyawan = Karyawan::orderBy('Nama')->get();
        return view('karyawan.index', compact('karyawan'));
    }

    // Menampilkan form tambah karyawan
    public function create()
    {
        return view('karyawan.create');
    }

    // Menyimpan karyawan baru
    public function store(Request $request)
    {
        $request->validate([
            'ID_Karyawan' => 'required|unique:karyawan|max:10',
            'Nama' => 'required|max:100',
            'Tanggal_Lahir' => 'required|date',
            'Alamat' => 'required',
            'Jabatan' => 'required|max:50',
            'Riwayat_Pekerjaan' => 'nullable'
        ]);

        Karyawan::create($request->all());

        return redirect()->route('karyawan.index')
                         ->with('success', 'Data karyawan berhasil ditambahkan');
    }

    // Menampilkan detail karyawan
    public function show($id)
    {
        // Ambil berdasarkan kolom ID_Karyawan karena itu primary key kamu
        $karyawan = \App\Models\Karyawan::where('ID_Karyawan', $id)->firstOrFail();
    
        return view('karyawan.show', compact('karyawan'));
    }
    

    // Menampilkan form edit karyawan
    public function edit($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        return view('karyawan.edit', compact('karyawan'));
    }

    // Memperbarui data karyawan
    public function update(Request $request, $id)
    {
        $request->validate([
            'ID_Karyawan' => 'required|max:10',
            'Nama' => 'required|max:100',
            'Tanggal_Lahir' => 'required|date',
            'Alamat' => 'required',
            'Jabatan' => 'required|max:50',
            'Riwayat_Pekerjaan' => 'nullable'
        ]);

        $karyawan = Karyawan::findOrFail($id);
        $karyawan->update($request->all());

        return redirect()->route('karyawan.index')
                         ->with('success', 'Data karyawan berhasil diperbarui');
    }

    // Konfirmasi penghapusan
    public function confirmDelete($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        return view('karyawan.delete', compact('karyawan'));
    }

    // Menghapus data karyawan
    public function destroy($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->delete();

        return redirect()->route('karyawan.index')
                         ->with('success', 'Data karyawan berhasil dihapus');
    }
}
