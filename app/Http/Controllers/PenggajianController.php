<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penggajian;
use App\Models\Karyawan;

class PenggajianController extends Controller
{
    public function index()
    {
        return view('penggajian.index', [
            'penggajian' => Penggajian::all()
        ]);
    }


    public function create()
    {
        $karyawans = Karyawan::all();
        return view('penggajian.create', compact('karyawans'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:karyawan,id',
            'gaji_pokok' => 'required|numeric',
            'potongan' => 'required|numeric',
            'bonus' => 'required|numeric',
            'catatan' => 'required|string|max:255',
        ]);
        
        Penggajian::create([
            'karyawan_id' => $request->input('karyawan_id'),
            'gaji_pokok' => $request->input('gaji_pokok'),
            'potongan' => $request->input('potongan'),
            'bonus' => $request->input('bonus'),
            'catatan' => $request->input('catatan'),
        ]);
        
        return redirect()->route('penggajian.index');
    }

    // Menampilkan detail
    public function show($id)
    {
        $penggajian = Penggajian::find($id);
    
        if (!$penggajian) {
            return redirect()->route('penggajian.index')->with('error', 'Data Penggajian tidak ditemukan.');
        }
    
        return view('penggajian.show', compact('penggajian'));
    }
    


    // Menampilkan form edit 
    public function edit($id)
    {
        $penggajian = Penggajian::findOrFail($id);
        return view('penggajian.edit', compact('penggajian'));
    }

    // Memproses update data karyawan
    public function update(Request $request, $id)
    {
        $request->validate([
            'gaji_pokok' => 'required|numeric',
            'potongan' => 'required|numeric',
            'bonus' => 'required|numeric',
            'catatan' => 'required|string|max:255',
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

    // Menghapus data 
    public function destroy($id)
    {
        $penggajian = Penggajian::findOrFail($id);
        $penggajian->delete();

        return redirect()->route('penggajian.index');
    }
}