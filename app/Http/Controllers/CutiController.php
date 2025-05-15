<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuti;
use App\Models\HR;
use App\Models\Karyawan;

class CutiController extends Controller
{
    public function index()
    {
        return view('cuti.index', [
            'cuti' => Cuti::all()
        ]);
    }

    public function create()
    {
        $karyawans = Karyawan::all();
        $hrs = HR::all();
        return view('cuti.create', compact('karyawans', 'hrs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:karyawan,id',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'keterangan_cuti' => 'required|string|max:255',
            'id_hrs' => 'required|exists:HRS,id',
        ]);

        Cuti::create($request->only([
            'karyawan_id', 'tanggal_mulai', 'tanggal_selesai', 'keterangan_cuti', 'id_hrs'
        ]));

        return redirect()->route('cuti.index')->with('success', 'Data cuti berhasil ditambahkan.');
    }

    public function show($id)
    {
        $cuti = Cuti::findOrFail($id);
        return view('cuti.show', compact('cuti'));
    }

    public function edit($id)
    {
        $cuti = Cuti::findOrFail($id);
        $karyawans = Karyawan::all();
        $hrs = HR::all();
        return view('cuti.edit', compact('cuti', 'karyawans', 'hrs'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'keterangan_cuti' => 'required|string|max:255',
            'id_hrs' => 'required|exists:HRS,id',
        ]);

        $cuti = Cuti::findOrFail($id);
        $cuti->update($request->only([
            'tanggal_mulai', 'tanggal_selesai', 'keterangan_cuti', 'id_hrs'
        ]));

        return redirect()->route('cuti.show', $id)->with('success', 'Data cuti berhasil diperbarui.');
    }

    // Halaman konfirmasi hapus
    public function delete($id)
    {
        $cuti = Cuti::findOrFail($id);
        return view('cuti.delete', compact('cuti'));
    }

    // Proses hapus data
    public function destroy($id)
    {
        $cuti = Cuti::findOrFail($id);
        $cuti->delete();

        return redirect()->route('cuti.index')->with('success', 'Data cuti berhasil dihapus.');
    }
}
