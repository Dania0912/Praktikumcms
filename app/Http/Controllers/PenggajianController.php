<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penggajian;
use App\Models\Karyawan;
use App\Models\HR;

class PenggajianController extends Controller
{
    // Menampilkan semua data penggajian
    public function index(Request $request)
{
    $search = $request->input('search');

    $penggajian = Penggajian::with(['karyawan', 'hr']);

    if ($search) {
        $penggajian = $penggajian->whereHas('karyawan', function ($query) use ($search) {
            $query->where('nama', 'like', "%{$search}%");
        });
    }

    $penggajian = $penggajian->get();

    return view('penggajian.index', compact('penggajian', 'search'));
}


    // Menampilkan form tambah penggajian
    public function create()
    {
        $karyawans = Karyawan::all();
        $hrs = HR::all();
        return view('penggajian.create', compact('karyawans', 'hrs'));
    }

    // Menyimpan data penggajian
    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:karyawan,id',
            'gaji_pokok' => 'required|numeric|min:0',
            'potongan' => 'required|numeric|min:0',
            'bonus' => 'required|numeric|min:0',
            'catatan' => 'nullable|string|max:255',
            'id_hrs' => 'required|exists:HRS,id',
        ], [
            'karyawan_id.required' => 'Nama karyawan wajib dipilih.',
            'id_hrs.required' => 'HR yang bertanggung jawab wajib dipilih.',
            'gaji_pokok.min' => 'Gaji pokok tidak boleh negatif.',
            'potongan.min' => 'Potongan tidak boleh negatif.',
            'bonus.min' => 'Bonus tidak boleh negatif.',
        ]);

        Penggajian::create($request->only([
            'karyawan_id', 'gaji_pokok', 'potongan', 'bonus', 'catatan', 'id_hrs'
        ]));

        return redirect()->route('penggajian.index')->with('success', 'Data penggajian berhasil ditambahkan.');
    }

    // Menampilkan detail penggajian
    public function show($id)
    {
        $penggajian = Penggajian::with(['karyawan', 'hr'])->find($id);

        if (!$penggajian) {
            return redirect()->route('penggajian.index')->with('error', 'Data penggajian tidak ditemukan.');
        }

        return view('penggajian.show', compact('penggajian'));
    }

    // Menampilkan form edit penggajian
    public function edit($id)
    {
        $penggajian = Penggajian::findOrFail($id);
        $karyawans = Karyawan::all();
        $hrs = HR::all();

        return view('penggajian.edit', compact('penggajian', 'karyawans', 'hrs'));
    }

    // Memperbarui data penggajian
    public function update(Request $request, $id)
    {
        $request->validate([
            'gaji_pokok' => 'required|numeric|min:0',
            'potongan' => 'required|numeric|min:0',
            'bonus' => 'required|numeric|min:0',
            'catatan' => 'nullable|string|max:255',
        ], [
            'gaji_pokok.min' => 'Gaji pokok tidak boleh negatif.',
            'potongan.min' => 'Potongan tidak boleh negatif.',
            'bonus.min' => 'Bonus tidak boleh negatif.',
        ]);

        $penggajian = Penggajian::findOrFail($id);

        $penggajian->update($request->only([
            'gaji_pokok', 'potongan', 'bonus', 'catatan'
        ]));

        return redirect()->route('penggajian.show', $id)->with('success', 'Data penggajian berhasil diperbarui.');
    }

    // Menampilkan konfirmasi hapus
    public function delete($id)
    {
        $penggajian = Penggajian::findOrFail($id);
        return view('penggajian.delete', compact('penggajian'));
    }

    // Menghapus data penggajian
    public function destroy($id)
    {
        $penggajian = Penggajian::findOrFail($id);
        $penggajian->delete();

        return redirect()->route('penggajian.index')->with('success', 'Data penggajian berhasil dihapus.');
    }
}
