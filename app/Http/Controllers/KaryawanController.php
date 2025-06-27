<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class KaryawanController extends Controller
{
    public function index(Request $request)
    {
        $search = trim($request->input('search'));

        if ($search) {
            $karyawan = Karyawan::where('nama', 'like', "%{$search}%")->get();
        } else {
            $karyawan = Karyawan::all();
        }

        return view('karyawan.index', [
            'karyawan' => $karyawan,
            'search' => $search
        ]);
    }

    public function create()
    {
        return view('karyawan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:100', 'regex:/^[A-Za-z\s]+$/', 'not_regex:/^\.+$/'],
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'jabatan' => ['required', 'string', 'max:100', 'regex:/^[A-Za-z\s]+$/', 'not_regex:/^\.+$/'],
            'riwayat_pekerjaan' => 'required|string|max:255',
        ]);

        try {
            Karyawan::create($request->only([
                'nama', 'tanggal_lahir', 'alamat', 'jabatan', 'riwayat_pekerjaan'
            ]));
            return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->route('karyawan.index')->withErrors('Gagal menambahkan data karyawan.');
        }
    }

    public function show($id)
    {
        try {
            $karyawan = Karyawan::findOrFail($id);
            return view('karyawan.show', compact('karyawan'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('karyawan.index')->withErrors('Data karyawan tidak ditemukan.');
        }
    }

    public function edit($id)
    {
        try {
            $karyawan = Karyawan::findOrFail($id);
            return view('karyawan.edit', compact('karyawan'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('karyawan.index')->withErrors('Data karyawan tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:100', 'regex:/^[A-Za-z\s]+$/', 'not_regex:/^\.+$/'],
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'jabatan' => ['required', 'string', 'max:100', 'regex:/^[A-Za-z\s]+$/', 'not_regex:/^\.+$/'],
            'riwayat_pekerjaan' => 'required|string|max:255',
        ]);

        try {
            $karyawan = Karyawan::findOrFail($id);
            $karyawan->update($request->only([
                'nama', 'tanggal_lahir', 'alamat', 'jabatan', 'riwayat_pekerjaan'
            ]));
            return redirect()->route('karyawan.show', $id)->with('success', 'Data karyawan berhasil diperbarui');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('karyawan.index')->withErrors('Data karyawan tidak ditemukan.');
        }
    }

    public function delete($id)
    {
        try {
            $karyawan = Karyawan::findOrFail($id);
            return view('karyawan.delete', compact('karyawan'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('karyawan.index')->withErrors('Data karyawan tidak ditemukan.');
        }
    }

    public function destroy($id)
    {
        try {
            $karyawan = Karyawan::findOrFail($id);
            $karyawan->delete();
            return redirect()->route('karyawan.index')->with('success', 'Data karyawan berhasil dihapus');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('karyawan.index')->withErrors('Data karyawan tidak ditemukan.');
        }
    }
}
