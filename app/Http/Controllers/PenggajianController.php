<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penggajian;
use App\Models\Karyawan;
use App\Models\HR;

class PenggajianController extends Controller
{
    // Menampilkan form untuk membuat data penggajian baru
    public function create()
    {
        $karyawans = Karyawan::all();
        $hrs = HR::all(); // ambil data HR untuk dropdown
        return view('penggajian.create', compact('karyawans', 'hrs'));
    }

    // Menyimpan data penggajian ke database
    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:karyawan,id',
            'gaji_pokok' => 'required|numeric',
            'potongan' => 'required|numeric',
            'bonus' => 'required|numeric',
            'catatan' => 'nullable|string|max:255',
            'id_hrs' => 'required|exists:HRS,id',
        ]);
        
        Penggajian::create([
            'karyawan_id' => $request->input('karyawan_id'),
            'gaji_pokok' => $request->input('gaji_pokok'),
            'potongan' => $request->input('potongan'),
            'bonus' => $request->input('bonus'),
            'catatan' => $request->input('catatan'),
            'id_hrs' => $request->input('id_hrs'),
        ]);
        
        return redirect()->route('penggajian.index');
    }

    // Menampilkan detail penggajian
    public function show($id)
    {
        $penggajian = Penggajian::find($id);

        if (!$penggajian) {
            return redirect()->route('penggajian.index')->with('error', 'Data Penggajian tidak ditemukan.');
        }

        return view('penggajian.show', compact('penggajian'));
    }

    // Menampilkan form edit penggajian
    public function edit($id)
    {
        $penggajian = Penggajian::findOrFail($id);
        return view('penggajian.edit', compact('penggajian'));
    }

    // Memproses update data penggajian
    public function update(Request $request, $id)
    {
        $request->validate([
            'gaji_pokok' => 'required|numeric',
            'potongan' => 'required|numeric',
            'bonus' => 'required|numeric',
            'catatan' => 'nullable|string|max:255',
        ]);

        $penggajian = Penggajian::findOrFail($id);

        $penggajian->update([
            'gaji_pokok' => $request->input('gaji_pokok'),
            'potongan' => $request->input('potongan'),
            'bonus' => $request->input('bonus'),
            'catatan' => $request->input('catatan'),
        ]);

        return redirect()->route('penggajian.show', $id);
    }

    // Menampilkan halaman konfirmasi hapus
    public function delete($id)
    {
        $penggajian = Penggajian::findOrFail($id);
        return view('penggajian.delete', compact('penggajian'));
    }

    public function index()
    {
        $penggajian = Penggajian::with(['karyawan', 'hr'])->get();
        return view('penggajian.index', compact('penggajian'));
    }
    


    // Menghapus data penggajian
    public function destroy($id)
    {
        $penggajian = Penggajian::findOrFail($id);
        $penggajian->delete();

        return redirect()->route('penggajian.index');
    }
}
// test update 26 Mei
