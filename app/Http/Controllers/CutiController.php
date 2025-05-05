<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuti;

class CutiController extends Controller
{
    // Menampilkan daftar semua cuti
    public function index()
    {
        return view('cuti.index', [
        ]);
    }

    // Menampilkan form tambah cuti
    public function create()
    {
        return view('cuti.create');
    }

    // Menyimpan data cuti baru
    public function store(Request $request)
    {
        $request->validate([
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'keterangan_cuti' => 'required|string|max:255',
        ]);

        Cuti::create([
            'tanggal_mulai' => $request->input('tanggal_mulai'),
            'tanggal_selesai' => $request->input('tanggal_selesai'),
            'keterangan_cuti' => $request->input('keterangan_cuti'),
        ]);

        return redirect()->route('cuti.index');
    }

    // Menampilkan detail cuti
    public function show($id)
    {
        $cuti = Cuti::findOrFail($id);
        return view('cuti.show', compact('cuti'));
    }

    // Menampilkan form edit cuti
    public function edit($id)
    {
        $cuti = Cuti::findOrFail($id);
        return view('cuti.edit', compact('cuti'));
    }

    // Memproses update data cuti
    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'keterangan_cuti' => 'required|string|max:255',
        ]);

        $cuti = Cuti::findOrFail($id);

        $cuti->update([
            'tanggal_mulai' => $request->input('tanggal_mulai'),
            'tanggal_selesai' => $request->input('tanggal_selesai'),
            'keterangan_cuti' => $request->input('keterangan_cuti'),
        ]);

        return redirect()->route('cuti.show', $id);
    }

    // Menampilkan halaman konfirmasi hapus
    public function delete($id)
    {
        $cuti = Cuti::findOrFail($id);
        return view('cuti.delete', compact('cuti'));
    }

    // Menghapus data cuti
    public function destroy($id)
    {
        $cuti = Cuti::findOrFail($id);
        $cuti->delete();

        return redirect()->route('cuti.index');
    }
}
