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

    public function index()
    {
        $this->seed();
        
        // Data yang akan dikirim ke view
        $pageTitle = 'Karyawan';  // Set the page title
        $createRoute = route('karyawan.create');  // Define the route for creating a new Karyawan
        $columns = ['ID Karyawan', 'Nama', 'Tanggal Lahir', 'Alamat', 'Jabatan', 'Riwayat Pekerjaan'];  // Definisikan kolom
        $fields = ['ID_Karyawan', 'Nama', 'Tanggal_Lahir', 'Alamat', 'Jabatan', 'Riwayat_Pekerjaan'];  // Definisikan field yang sesuai
        $data = self::$karyawanList;  // Daftar data karyawan yang akan ditampilkan
        $showRoute = 'karyawan.show';  // Route untuk melihat detail karyawan
        $editRoute = 'karyawan.edit';  // Route untuk mengedit karyawan
        $confirmDeleteRoute = 'karyawan.confirmDelete';  // Route untuk mengkonfirmasi penghapusan karyawan

        // Mengirim data ke view
        return view('karyawan.index', [
            'karyawans' => self::$karyawanList,
            'pageTitle' => $pageTitle,
            'createRoute' => $createRoute,
            'columns' => $columns,
            'fields' => $fields,
            'data' => $data,
            'showRoute' => $showRoute,
            'editRoute' => $editRoute,
            'confirmDeleteRoute' => $confirmDeleteRoute
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
