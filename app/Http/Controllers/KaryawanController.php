<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;

class KaryawanController extends Controller
{
    protected static $karyawanList = [];

    private function seed()
    {
        if (empty(self::$karyawanList)) {
            self::$karyawanList = [
                new Karyawan('K001', 'Dania', '1990-01-01', 'Jl. Merpati No. 1', 'Manager', 'PT A, PT B'),
                new Karyawan('K002', 'Budi', '1992-05-12', 'Jl. Kenari No. 2', 'Staff', 'PT C')
            ];
        }
    }

    public function index()
    {
        $this->seed();
        return view('karyawan.index', ['karyawan' => self::$karyawanList]);
    }

    public function create()
    {
        return view('karyawan.create');
    }

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

        $karyawan = new Karyawan(
            $request->ID_Karyawan,
            $request->Nama,
            $request->Tanggal_Lahir,
            $request->Alamat,
            $request->Jabatan,
            $request->Riwayat_Pekerjaan
        );

        self::$karyawanList[] = $karyawan;

        return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil ditambahkan.');
    }

    public function show($id)
    {
        $this->seed();
        $karyawan = collect(self::$karyawanList)->firstWhere('ID_Karyawan', $id);
        return view('karyawan.show', ['karyawan' => $karyawan]);
    }

    public function edit($id)
    {
        $this->seed();
        $karyawan = collect(self::$karyawanList)->firstWhere('ID_Karyawan', $id);
        return view('karyawan.edit', ['karyawan' => $karyawan]);
    }

    public function update(Request $request, $id)
    {
        $this->seed();
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

    public function confirmDelete($id)
    {
        $this->seed();
        $karyawan = collect(self::$karyawanList)->firstWhere('ID_Karyawan', $id);
        return view('karyawan.delete', ['karyawan' => $karyawan]);
    }

    public function destroy($id)
    {
        $this->seed();
        self::$karyawanList = array_filter(self::$karyawanList, function ($karyawan) use ($id) {
            return $karyawan->ID_Karyawan !== $id;
        });

        return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil dihapus.');
    }
}
