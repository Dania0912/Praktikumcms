<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuti;
use App\Models\HR;
use App\Models\Karyawan;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;
use Throwable;

class CutiController extends Controller
{
    public function index(Request $request)
    {
        $query = Cuti::with('karyawan');

        if ($request->has('search')) {
            $query->whereHas('karyawan', function ($q) use ($request) {
                $q->where('nama', 'like', "%{$request->search}%");
            });
        }

        $cuti = $query->get();

        return view('cuti.index', [
            'cuti' => $cuti,
            'search' => $request->search
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
        try {
            $validated = $request->validate([
                'karyawan_id' => 'required|exists:karyawan,id',
                'tanggal_mulai' => 'required|date',
                'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
                'keterangan_cuti' => 'required|string|max:15|not_regex:/^\.+$/',
                'id_hrs' => 'required|exists:HRS,id',
            ]);

            Cuti::create($validated);

            return redirect()->route('cuti.index')->with('success', 'Data cuti berhasil ditambahkan.');
        } catch (Throwable $e) {
            Log::error('Gagal menyimpan cuti', [
                'message' => $e->getMessage(),
                'input' => $request->all(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat menyimpan data.');
        }
    }

    public function show($id)
    {
        try {
            $cuti = Cuti::findOrFail($id);
            return view('cuti.show', compact('cuti'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('cuti.index')->with('error', 'Data cuti tidak ditemukan.');
        }
    }

    public function edit($id)
    {
        try {
            $cuti = Cuti::findOrFail($id);
            $karyawans = Karyawan::all();
            $hrs = HR::all();
            return view('cuti.edit', compact('cuti', 'karyawans', 'hrs'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('cuti.index')->with('error', 'Data cuti tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $cuti = Cuti::findOrFail($id);

            $validated = $request->validate([
                'tanggal_mulai' => 'required|date',
                'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
                'keterangan_cuti' => 'required|string|<max:15></max:15>|not_regex:/^\.+$/',
                'id_hrs' => 'required|exists:HRS,id',
            ]);

            $cuti->update($validated);

            return redirect()->route('cuti.index')->with('success', 'Data cuti berhasil diperbarui.');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('cuti.index')->with('error', 'Data cuti tidak ditemukan.');
        } catch (Throwable $e) {
            Log::error('Gagal memperbarui cuti', [
                'id' => $id,
                'message' => $e->getMessage(),
                'input' => $request->all(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->back()->withInput()->with('error', 'Terjadi kesalahan saat memperbarui data.');
        }
    }

    public function delete($id)
    {
        try {
            $cuti = Cuti::findOrFail($id);
            return view('cuti.delete', compact('cuti'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('cuti.index')->with('error', 'Data cuti tidak ditemukan.');
        }
    }

    public function destroy($id)
    {
        try {
            $cuti = Cuti::findOrFail($id);
            $cuti->delete();

            return redirect()->route('cuti.index')->with('success', 'Data cuti berhasil dihapus.');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('cuti.index')->with('error', 'Data cuti tidak ditemukan.');
        } catch (Throwable $e) {
            Log::error('Gagal menghapus cuti', [
                'id' => $id,
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->route('cuti.index')->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}
