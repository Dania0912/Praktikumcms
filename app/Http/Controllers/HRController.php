<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HR;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;
use Throwable;

class HRController extends Controller
{
    public function index(Request $request)
    {
        try {
            $search = $request->input('search');

            if ($search) {
                $hrs = HR::where('nama', 'like', "%{$search}%")
                         ->orWhere('jabatan', 'like', "%{$search}%")
                         ->get();
            } else {
                $hrs = HR::all();
            }

            Log::info('Menampilkan data HR oleh user: ' . optional(auth()->user())->name);

            return view('hr.index', [
                'hrs' => $hrs,
                'search' => $search
            ]);
        } catch (Throwable $e) {
            Log::error('Error menampilkan data HR: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);
            return redirect()->back()->withErrors('Gagal menampilkan data HR.');
        }
    }

    public function create()
    {
        Log::info('Form tambah HR dibuka oleh user: ' . optional(auth()->user())->name);
        return view('hr.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:100', 'regex:/^[A-Za-z\s]+$/', 'not_regex:/^\.+$/'],
            'jabatan' => ['required', 'string', 'max:100', 'regex:/^[A-Za-z\s]+$/', 'not_regex:/^\.+$/'],
        ]);

        try {
            HR::create($request->only(['nama', 'jabatan']));
            Log::info('Data HR berhasil ditambahkan oleh user: ' . optional(auth()->user())->name);
            return redirect()->route('hr.index')->with('success', 'Data HR berhasil ditambahkan.');
        } catch (Throwable $e) {
            Log::error('Error menyimpan data HR: ' . $e->getMessage(), [
                'request' => $request->all(),
                'trace' => $e->getTraceAsString(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);
            return redirect()->route('hr.index')->withErrors('Gagal menambahkan data HR.');
        }
    }

    public function show($id)
    {
        try {
            $hr = HR::findOrFail($id);
            Log::info('Data HR ID ' . $id . ' berhasil ditampilkan oleh user: ' . optional(auth()->user())->name);
            return view('hr.show', compact('hr'));
        } catch (Throwable $e) {
            Log::error('Error menampilkan data HR: ' . $e->getMessage(), [
                'id' => $id,
                'trace' => $e->getTraceAsString(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);
            return redirect()->route('hr.index')->withErrors('Data HR tidak ditemukan.');
        }
    }

    public function edit($id)
    {
        try {
            $hr = HR::findOrFail($id);
            Log::info('Form edit HR ID ' . $id . ' dibuka oleh user: ' . optional(auth()->user())->name);
            return view('hr.edit', compact('hr'));
        } catch (Throwable $e) {
            Log::error('Error membuka form edit HR: ' . $e->getMessage(), [
                'id' => $id,
                'trace' => $e->getTraceAsString(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);
            return redirect()->route('hr.index')->withErrors('Data HR tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => ['required', 'string', 'max:100', 'regex:/^[A-Za-z\s]+$/', 'not_regex:/^\.+$/'],
            'jabatan' => ['required', 'string', 'max:100', 'regex:/^[A-Za-z\s]+$/', 'not_regex:/^\.+$/'],
        ]);

        try {
            $hr = HR::findOrFail($id);
            $hr->update($request->only(['nama', 'jabatan']));
            Log::info('Data HR ID ' . $id . ' berhasil diperbarui oleh user: ' . optional(auth()->user())->name);
            return redirect()->route('hr.show', $id)->with('success', 'Data HR berhasil diperbarui.');
        } catch (Throwable $e) {
            Log::error('Error memperbarui data HR: ' . $e->getMessage(), [
                'id' => $id,
                'request' => $request->all(),
                'trace' => $e->getTraceAsString(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);
            return redirect()->route('hr.index')->withErrors('Data HR tidak ditemukan.');
        }
    }

    public function delete($id)
    {
        try {
            $hr = HR::findOrFail($id);
            Log::info('Form konfirmasi hapus HR ID ' . $id . ' dibuka oleh user: ' . optional(auth()->user())->name);
            return view('hr.delete', compact('hr'));
        } catch (Throwable $e) {
            Log::error('Error membuka halaman delete HR: ' . $e->getMessage(), [
                'id' => $id,
                'trace' => $e->getTraceAsString(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);
            return redirect()->route('hr.index')->withErrors('Data HR tidak ditemukan.');
        }
    }

    public function destroy($id)
    {
        try {
            $hr = HR::findOrFail($id);
            $hr->forceDelete();
            Log::info('Data HR ID ' . $id . ' berhasil dihapus oleh user: ' . optional(auth()->user())->name);
            return redirect()->route('hr.index')->with('success', 'Data HR berhasil dihapus.');
        } catch (Throwable $e) {
            Log::error('Error menghapus data HR: ' . $e->getMessage(), [
                'id' => $id,
                'trace' => $e->getTraceAsString(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);
            return redirect()->route('hr.index')->withErrors('Data HR tidak ditemukan.');
        }
    }
}