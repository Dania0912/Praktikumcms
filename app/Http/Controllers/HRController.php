<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HR;

class HRController extends Controller
{
    // Menampilkan semua data HR
    public function index(Request $request)
{
    $search = $request->input('search');

    if ($search) {
        $hrs = HR::where('nama', 'like', "%{$search}%")
                  ->orWhere('jabatan', 'like', "%{$search}%")
                  ->get();
    } else {
        $hrs = HR::all();
    }

    return view('hr.index', [
        'hrs' => $hrs,
        'search' => $search
    ]);
}


    // Menampilkan form tambah HR
    public function create()
    {
        return view('hr.create');
    }

    // Menyimpan data HR baru
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
            'jabatan' => [
                'required',
                'string',
                'max:100',
                'regex:/^[A-Za-z\s]+$/',        // hanya huruf dan spasi
                'not_regex:/^\.+$/',            // tidak boleh hanya titik-titik
            ],
        ]);
        

        HR::create($request->only(['nama', 'jabatan']));

        return redirect()->route('hr.index')->with('success', 'Data HR berhasil ditambahkan.');
    }

    // Menampilkan detail HR
    public function show($id)
    {
        $hr = HR::findOrFail($id);
        return view('hr.show', compact('hr'));
    }

    // Menampilkan form edit HR
    public function edit($id)
    {
        $hr = HR::findOrFail($id);
        return view('hr.edit', compact('hr'));
    }

    // Memperbarui data HR
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => [
                'required',
                'string',
                'max:100',
                'regex:/^[A-Za-z\s]+$/',        // hanya huruf dan spasi
                'not_regex:/^\.+$/',            // tidak boleh hanya titik-titik
            ],
            'jabatan' => [
                'required',
                'string',
                'max:100',
                'regex:/^[A-Za-z\s]+$/',        // hanya huruf dan spasi
                'not_regex:/^\.+$/',            // tidak boleh hanya titik-titik
            ],
        ]);
        

        $hr = HR::findOrFail($id);
        $hr->update($request->only(['nama', 'jabatan']));

        return redirect()->route('hr.show', $id)->with('success', 'Data HR berhasil diperbarui.');
    }

    // Menampilkan konfirmasi penghapusan
    public function delete($id)
    {
        $hr = HR::findOrFail($id);
        return view('hr.delete', compact('hr'));
    }

    // Menghapus data HR
    public function destroy($id)
    {
        $hr = HR::findOrFail($id);
        $hr->forceDelete();

        return redirect()->route('hr.index')->with('success', 'Data HR berhasil dihapus.');
    }
}
