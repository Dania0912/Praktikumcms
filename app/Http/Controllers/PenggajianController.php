<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penggajian;
use App\Models\Karyawan;
use App\Models\HR;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;
use Throwable;

class PenggajianController extends Controller
{
    // Menampilkan daftar penggajian
    public function index(Request $request)
    {
        try {
            $search = $request->input('search');
            $penggajian = Penggajian::with(['karyawan', 'hr']);

            if ($search) {
                $penggajian = $penggajian->whereHas('karyawan', function ($query) use ($search) {
                    $query->where('nama', 'like', "%{$search}%");
                });
            }

            $penggajian = $penggajian->get();
            Log::info('Data penggajian ditampilkan.', ['search' => $search]);

            return view('penggajian.index', compact('penggajian', 'search'));
        } catch (Throwable $e) {
            Log::error('Gagal menampilkan data penggajian.', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return redirect()->back()->withErrors('Gagal menampilkan data penggajian.');
        }
    }

    // Menampilkan form tambah penggajian
    public function create()
    {
        try {
            $karyawans = Karyawan::all();
            $hrs = HR::all();
            Log::info('Form tambah penggajian dibuka.');
            return view('penggajian.create', compact('karyawans', 'hrs'));
        } catch (Throwable $e) {
            Log::error('Gagal membuka form tambah penggajian.', [
                'message' => $e->getMessage()
            ]);
            return redirect()->route('penggajian.index')->withErrors('Gagal memuat form tambah penggajian.');
        }
    }

    // Menyimpan data penggajian
    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:karyawan,id',
            'gaji_pokok' => 'required|numeric|min:0',
            'potongan' => 'nullable|numeric|min:0',
            'bonus' => 'nullable|numeric|min:0',
            'catatan' => 'nullable|string|max:255',
            'id_hrs' => 'required|exists:HRS,id'
        ]);

        try {
            Penggajian::create($request->only([
                'karyawan_id', 'gaji_pokok', 'potongan', 'bonus', 'catatan', 'id_hrs'
            ]));
            Log::info('Penggajian berhasil ditambahkan.', $request->all());
            return redirect()->route('penggajian.index')->with('success', 'Data penggajian berhasil ditambahkan.');
        } catch (Throwable $e) {
            Log::error('Gagal menambahkan penggajian.', [
                'message' => $e->getMessage(),
                'input' => $request->all()
            ]);
            return redirect()->route('penggajian.index')->withErrors('Gagal menambahkan data penggajian.');
        }
    }

    // Menampilkan detail penggajian
    public function show($id)
    {
        try {
            $penggajian = Penggajian::with(['karyawan', 'hr'])->findOrFail($id);
            Log::info("Detail penggajian ID {$id} ditampilkan.");
            return view('penggajian.show', compact('penggajian'));
        } catch (ModelNotFoundException $e) {
            Log::warning("Penggajian ID {$id} tidak ditemukan.");
            return redirect()->route('penggajian.index')->withErrors('Data penggajian tidak ditemukan.');
        }
    }

    // Menampilkan form edit penggajian
    public function edit($id)
    {
        try {
            $penggajian = Penggajian::findOrFail($id);
            $karyawans = Karyawan::all();
            $hrs = HR::all();
            Log::info("Form edit penggajian ID {$id} dibuka.");
            return view('penggajian.edit', compact('penggajian', 'karyawans', 'hrs'));
        } catch (ModelNotFoundException $e) {
            Log::warning("Gagal membuka form edit. Penggajian ID {$id} tidak ditemukan.");
            return redirect()->route('penggajian.index')->withErrors('Data penggajian tidak ditemukan.');
        }
    }

    // Menyimpan pembaruan penggajian
    public function update(Request $request, $id)
    {
        $request->validate([
            'gaji_pokok' => 'required|numeric|min:0',
            'potongan' => 'nullable|numeric|min:0',
            'bonus' => 'nullable|numeric|min:0',
            'catatan' => 'nullable|string|max:255'
        ]);

        try {
            $penggajian = Penggajian::findOrFail($id);
            $penggajian->update($request->only([
                'gaji_pokok', 'potongan', 'bonus', 'catatan'
            ]));
            Log::info("Penggajian ID {$id} berhasil diperbarui.", $request->all());
            return redirect()->route('penggajian.show', $id)->with('success', 'Data penggajian berhasil diperbarui.');
        } catch (ModelNotFoundException $e) {
            Log::warning("Penggajian ID {$id} tidak ditemukan saat update.");
            return redirect()->route('penggajian.index')->withErrors('Data penggajian tidak ditemukan.');
        }
    }

    // Menampilkan form konfirmasi hapus
    public function delete($id)
    {
        try {
            $penggajian = Penggajian::findOrFail($id);
            Log::info("Form konfirmasi hapus penggajian ID {$id} dibuka.");
            return view('penggajian.delete', compact('penggajian'));
        } catch (ModelNotFoundException $e) {
            Log::warning("Gagal membuka form delete. Penggajian ID {$id} tidak ditemukan.");
            return redirect()->route('penggajian.index')->withErrors('Data penggajian tidak ditemukan.');
        }
    }

    // Menghapus data penggajian
    public function destroy($id)
    {
        try {
            $penggajian = Penggajian::findOrFail($id);
            $penggajian->delete();
            Log::info("Penggajian ID {$id} berhasil dihapus.");
            return redirect()->route('penggajian.index')->with('success', 'Data penggajian berhasil dihapus.');
        } catch (ModelNotFoundException $e) {
            Log::warning("Penggajian ID {$id} tidak ditemukan saat hapus.");
            return redirect()->route('penggajian.index')->withErrors('Data penggajian tidak ditemukan.');
        }
    }
}
