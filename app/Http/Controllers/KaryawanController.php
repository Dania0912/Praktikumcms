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
            'nama' => [
                'required',
                'string',
                'max:100',
                'regex:/^[A-Za-z\s]+$/',        // hanya huruf dan spasi
                'not_regex:/^\.+$/',            // tidak boleh hanya titik-titik
            ],
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'jabatan' => [
                'required',
                'string',
                'max:100',
                'regex:/^[A-Za-z\s]+$/',
                'not_regex:/^\.+$/',
            ],
            'riwayat_pekerjaan' => 'required|string|max:255',
        ], [
            'nama.regex' => 'Nama hanya boleh berisi huruf dan spasi.',
            'nama.not_regex' => 'Nama tidak boleh hanya berisi titik.',
            'jabatan.regex' => 'Jabatan hanya boleh berisi huruf dan spasi.',
            'jabatan.not_regex' => 'Jabatan tidak boleh hanya berisi titik.',
        ]);

        Karyawan::create($request->only([
            'nama', 'tanggal_lahir', 'alamat', 'jabatan', 'riwayat_pekerjaan'
        ]));

        return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil ditambahkan');
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
            'nama' => [
                'required',
                'string',
                'max:100',
                'regex:/^[A-Za-z\s]+$/',
                'not_regex:/^\.+$/',
            ],
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'jabatan' => [
                'required',
                'string',
                'max:100',
                'regex:/^[A-Za-z\s]+$/',
                'not_regex:/^\.+$/',
            ],
            'riwayat_pekerjaan' => 'required|string|max:255',
        ], [
            'nama.regex' => 'Nama hanya boleh berisi huruf dan spasi.',
            'nama.not_regex' => 'Nama tidak boleh hanya berisi titik.',
            'jabatan.regex' => 'Jabatan hanya boleh berisi huruf dan spasi.',
            'jabatan.not_regex' => 'Jabatan tidak boleh hanya berisi titik.',
        ]);

        $karyawan = Karyawan::findOrFail($id);
        $karyawan->update($request->only([
            'nama', 'tanggal_lahir', 'alamat', 'jabatan', 'riwayat_pekerjaan'
        ]));

        return redirect()->route('karyawan.show', $id)->with('success', 'Data karyawan berhasil diperbarui');
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

        return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil dihapus');
    }
}
