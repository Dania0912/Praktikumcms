<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HR;

class HRController extends Controller
{
    // Menampilkan daftar semua 
    public function index()
    {
        return view('hr.index', [
            'hr' => HR::all()
        ]);
    }

    // Menampilkan form tambah 
    public function create()
    {
        return view('hr.create');
    }

    // Menyimpan data 
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
        ]);

        HR::create([
            'nama' => $request->input('nama'),
            'jabatan' => $request->input('jabatan'),
        ]);

        return redirect()->route('hr.index');
    }

    // Menampilkan detail 
    public function show($id)
    {
        $hr = HR::findOrFail($id);
        return view('hr.show', compact('hr'));
    }

    // Menampilkan form edit 
    public function edit($id)
    {
        $hr = HR::findOrFail($id);
        return view('hr.edit', compact('hr'));
    }

    // Memproses update data 
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
        ]);

        $hr = HR::findOrFail($id);

        $hr->update([
            'nama' => $request->input('nama'),
            'jabatan' => $request->input('jabatan'),
        ]);

        return redirect()->route('hr.show', $id);
    }

    // Menampilkan halaman konfirmasi hapus
    public function delete($id)
    {
        $hr = HR::findOrFail($id);
        return view('hr.delete', compact('hr'));
    }

    // Menghapus data 
    public function destroy($id)
    {
        $hr = Karyawan::findOrFail($id);
        $hr->delete();

        return redirect()->route('hr.index');
    }
}