<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    // Menyimpan daftar karyawan secara statis
    protected static $karyawanList = [];

    // Mengisi data karyawan secara manual
    private function seed()
    {
        if (empty(self::$karyawanList)) {
            self::$karyawanList = [
                new Karyawan('K001', 'Dania', '1990-01-01', 'Jl. Merpati No. 1', 'Manager', 'PT A, PT B'),
                new Karyawan('K002', 'Budi', '1992-05-12', 'Jl. Kenari No. 2', 'Staff', 'PT C')
            ];
        }
    }

    // Menampilkan daftar karyawan
    public function index()
    {
        $this->seed();
        return view('karyawan.index', ['karyawans' => self::$karyawanList]);
    }

    // Menampilkan form tambah karyawan
    public function create()
    {
        return view('karyawan.create');
    }

    // Menyimpan data karyawan baru
    public function store(Request $request)
    {
        $this->seed();
        $request->validate([
            'ID_Karyawan' => 'required',
            'Nama' => 'required',
            'Tanggal_Lahir' => 'required|date',
            'Alamat' => 'required',
            'Jabatan' => 'required',
            'Riwayat_Pekerjaan' => 'required'
        ]);

        // Membuat data karyawan baru
        $karyawan = new Karyawan(
            $request->ID_Karyawan,
            $request->Nama,
            $request->Tanggal_Lahir,
            $request->Alamat,
            $request->Jabatan,
            $request->Riwayat_Pekerjaan
        );

        // Menambah data karyawan ke dalam daftar
        self::$karyawanList[] = $karyawan;

        return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil ditambahkan.');
    }

    // Menampilkan detail karyawan
    public function show($id)
    {
        $this->seed();
        // Mencari karyawan berdasarkan ID
        $karyawan = collect(self::$karyawanList)->firstWhere('ID_Karyawan', $id);
        return view('karyawan.show', ['karyawan' => $karyawan]);
    }

    // Menampilkan form edit karyawan
    public function edit($id)
    {
        $this->seed();
        // Mencari karyawan berdasarkan ID
        $karyawan = collect(self::$karyawanList)->firstWhere('ID_Karyawan', $id);
        return view('karyawan.edit', ['karyawan' => $karyawan]);
    }

    // Menyimpan pembaruan data karyawan
    public function update(Request $request, $id)
    {
        $this->seed();

        // Mencari karyawan berdasarkan ID dan melakukan update
        foreach (self::$karyawanList as $key => $karyawan) {
            if ($karyawan->ID_Karyawan === $id) {
                self::$karyawanList[$key]->Nama = $request->Nama;
                self::$karyawanList[$key]->Tanggal_Lahir = $request->Tanggal_Lahir;
                self::$karyawanList[$key]->Alamat = $request->Alamat;
                self::$karyawanList[$key]->Jabatan = $request->Jabatan;
                self::$karyawanList[$key]->Riwayat_Pekerjaan = $request->Riwayat_Pekerjaan;
            }
        }

        return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil diperbarui.');
    }

    // Menampilkan konfirmasi sebelum menghapus karyawan
    public function confirmDelete($id)
    {
        $this->seed();
        // Mencari karyawan berdasarkan ID
        $karyawan = collect(self::$karyawanList)->firstWhere('ID_Karyawan', $id);
        return view('karyawan.delete', ['karyawan' => $karyawan]);
    }

    // Menghapus data karyawan
    public function destroy($id)
    {
        $this->seed();

        // Menghapus karyawan berdasarkan ID
        self::$karyawanList = array_filter(self::$karyawanList, function ($karyawan) use ($id) {
            return $karyawan->ID_Karyawan !== $id;
        });

        return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil dihapus.');
    }
}
