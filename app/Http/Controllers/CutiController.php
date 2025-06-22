<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuti;
use App\Models\HR;
use App\Models\Karyawan;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CutiController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $cuti = Cuti::with('karyawan');

        if ($search) {
            $cuti = $cuti->whereHas('karyawan', function ($query) use ($search) {
                $query->where('nama', 'like', "%{$search}%");
            });
        }

        $cuti = $cuti->get();

        return view('cuti.index', [
            'cuti' => $cuti,
            'search' => $search
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
            'karyawan_id' => ['required', 'exists:karyawan,id'],
            'tanggal_mulai' => ['required', 'date'],
            'tanggal_selesai' => ['required', 'date', 'after_or_equal:tanggal_mulai'],
            'keterangan_cuti' => ['required', 'string', 'max:255', 'not_regex:/^\.+$/'],
            'id_hrs' => ['required', 'exists:HRS,id'],
        ], [
            'karyawan_id.required' => 'Karyawan harus dipilih.',
            'karyawan_id.exists' => 'Karyawan tidak ditemukan.',
            'tanggal_mulai.required' => 'Tanggal mulai cuti wajib diisi.',
            'tanggal_mulai.date' => 'Tanggal mulai cuti tidak valid.',
            'tanggal_selesai.required' => 'Tanggal selesai cuti wajib diisi.',
            'tanggal_selesai.date' => 'Tanggal selesai cuti tidak valid.',
            'tanggal_selesai.after_or_equal' => 'Tanggal selesai harus sama atau setelah tanggal mulai.',
            'keterangan_cuti.required' => 'Keterangan cuti wajib diisi.',
            'keterangan_cuti.max' => 'Keterangan cuti maksimal 255 karakter.',
            'keterangan_cuti.not_regex' => 'Keterangan cuti tidak boleh hanya terdiri dari titik-titik.',
            'id_hrs.required' => 'HR harus dipilih.',
            'id_hrs.exists' => 'HR tidak ditemukan.',
        ]);

        try {
            Cuti::create($request->only([
                'karyawan_id', 'tanggal_mulai', 'tanggal_selesai', 'keterangan_cuti', 'id_hrs'
            ]));
            return redirect()->route('cuti.index')->with('success', 'Data cuti berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->route('cuti.index')->withErrors('Gagal menambahkan data cuti.');
        }
    }

    public function show($id)
    {
        try {
            $cuti = Cuti::findOrFail($id);
            return view('cuti.show', compact('cuti'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('cuti.index')->withErrors('Data cuti tidak ditemukan.');
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
            return redirect()->route('cuti.index')->withErrors('Data cuti tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal_mulai' => ['required', 'date'],
            'tanggal_selesai' => ['required', 'date', 'after_or_equal:tanggal_mulai'],
            'keterangan_cuti' => ['required', 'string', 'max:255', 'not_regex:/^\.+$/'],
            'id_hrs' => ['required', 'exists:HRS,id'],
        ], [
            'tanggal_mulai.required' => 'Tanggal mulai cuti wajib diisi.',
            'tanggal_mulai.date' => 'Tanggal mulai cuti tidak valid.',
            'tanggal_selesai.required' => 'Tanggal selesai cuti wajib diisi.',
            'tanggal_selesai.date' => 'Tanggal selesai cuti tidak valid.',
            'tanggal_selesai.after_or_equal' => 'Tanggal selesai harus sama atau setelah tanggal mulai.',
            'keterangan_cuti.required' => 'Keterangan cuti wajib diisi.',
            'keterangan_cuti.max' => 'Keterangan cuti maksimal 255 karakter.',
            'keterangan_cuti.not_regex' => 'Keterangan cuti tidak boleh hanya terdiri dari titik-titik.',
            'id_hrs.required' => 'HR harus dipilih.',
            'id_hrs.exists' => 'HR tidak ditemukan.',
        ]);

        try {
            $cuti = Cuti::findOrFail($id);
            $cuti->update($request->only([
                'tanggal_mulai', 'tanggal_selesai', 'keterangan_cuti', 'id_hrs'
            ]));
            return redirect()->route('cuti.show', $id)->with('success', 'Data cuti berhasil diperbarui.');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('cuti.index')->withErrors('Data cuti tidak ditemukan.');
        }
    }

    public function delete($id)
    {
        try {
            $cuti = Cuti::findOrFail($id);
            return view('cuti.delete', compact('cuti'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('cuti.index')->withErrors('Data cuti tidak ditemukan.');
        }
    }

    public function destroy($id)
    {
        try {
            $cuti = Cuti::findOrFail($id);
            $cuti->delete();
            return redirect()->route('cuti.index')->with('success', 'Data cuti berhasil dihapus.');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('cuti.index')->withErrors('Data cuti tidak ditemukan.');
        }
    }
}
