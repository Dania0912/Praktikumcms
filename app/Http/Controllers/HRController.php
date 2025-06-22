<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HR;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
                'regex:/^[A-Za-z\s]+$/',
                'not_regex:/^\.+$/',
            ],
            'jabatan' => [
                'required',
                'string',
                'max:100',
                'regex:/^[A-Za-z\s]+$/',
                'not_regex:/^\.+$/',
            ],
        ]);

        try {
            HR::create($request->only(['nama', 'jabatan']));
            return redirect()->route('hr.index')->with('success', 'Data HR berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->route('hr.index')->withErrors('Gagal menambahkan data HR.');
        }
    }

    // Menampilkan detail HR
    public function show($id)
    {
        try {
            $hr = HR::findOrFail($id);
            return view('hr.show', compact('hr'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('hr.index')->withErrors('Data HR tidak ditemukan.');
        }
    }

    // Menampilkan form edit HR
    public function edit($id)
    {
        try {
            $hr = HR::findOrFail($id);
            return view('hr.edit', compact('hr'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('hr.index')->withErrors('Data HR tidak ditemukan.');
        }
    }

    // Memperbarui data HR
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
            'jabatan' => [
                'required',
                'string',
                'max:100',
                'regex:/^[A-Za-z\s]+$/',
                'not_regex:/^\.+$/',
            ],
        ]);

        try {
            $hr = HR::findOrFail($id);
            $hr->update($request->only(['nama', 'jabatan']));
            return redirect()->route('hr.show', $id)->with('success', 'Data HR berhasil diperbarui.');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('hr.index')->withErrors('Data HR tidak ditemukan.');
        }
    }

    // Menampilkan konfirmasi penghapusan
    public function delete($id)
    {
        try {
            $hr = HR::findOrFail($id);
            return view('hr.delete', compact('hr'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('hr.index')->withErrors('Data HR tidak ditemukan.');
        }
    }

    // Menghapus data HR
    public function destroy($id)
    {
        try {
            $hr = HR::findOrFail($id);
            $hr->forceDelete();
            return redirect()->route('hr.index')->with('success', 'Data HR berhasil dihapus.');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('hr.index')->withErrors('Data HR tidak ditemukan.');
        }
    }
}
