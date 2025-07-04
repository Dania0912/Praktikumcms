<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HR;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Throwable;

class HRController extends Controller
{
    public function index(Request $request)
    {
        try {
            $search = $request->input('search');

            $hrs = $search
                ? HR::where('nama', 'like', "%{$search}%")
                      ->orWhere('jabatan', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%")
                      ->get()
                : HR::all();

            Log::info('Menampilkan data HR oleh user: ' . optional(auth()->user())->name);

            return view('hr.index', compact('hrs', 'search'));
        } catch (Throwable $e) {
            Log::error('Error menampilkan data HR: ' . $e->getMessage());
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
            'nama'     => ['required', 'string', 'max:100', 'regex:/^[A-Za-z\s]+$/', 'not_regex:/^\.+$/'],
            'jabatan'  => ['required', 'string', 'max:100', 'regex:/^[A-Za-z\s]+$/', 'not_regex:/^\.+$/'],
            'email'    => ['required', 'email', 'max:100', 'unique:hrs,email'],
            'password' => ['required', 'string', 'min:6'],
        ]);

        try {
            HR::create([
                'nama'     => $request->nama,
                'jabatan'  => $request->jabatan,
                'email'    => $request->email,
                'password' => Hash::make($request->password),
            ]);

            Log::info('Data HR berhasil ditambahkan oleh user: ' . optional(auth()->user())->name);
            return redirect()->route('hr.index')->with('success', 'Data HR berhasil ditambahkan.');
        } catch (Throwable $e) {
            if (str_contains($e->getMessage(), 'Duplicate entry') && str_contains($e->getMessage(), 'hrs_email_unique')) {
                Log::warning('Percobaan duplikasi email HR: ' . $request->email . ' oleh user: ' . optional(auth()->user())->name);
            }
            
            Log::error('Error menyimpan data HR: ' . $e->getMessage());
            return redirect()->route('hr.index')->withErrors('Gagal menambahkan data HR.');
        }
    }

    public function show($id)
    {
        try {
            $hr = HR::findOrFail($id);
            Log::info('Data HR ID ' . $id . ' berhasil ditampilkan.');
            return view('hr.show', compact('hr'));
        } catch (Throwable $e) {
            Log::error('Error menampilkan data HR: ' . $e->getMessage());
            return redirect()->route('hr.index')->withErrors('Data HR tidak ditemukan.');
        }
    }

    public function edit($id)
    {
        try {
            $hr = HR::findOrFail($id);
            Log::info('Form edit HR ID ' . $id . ' dibuka.');
            return view('hr.edit', compact('hr'));
        } catch (Throwable $e) {
            Log::error('Error membuka form edit HR: ' . $e->getMessage());
            return redirect()->route('hr.index')->withErrors('Data HR tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'     => ['required', 'string', 'max:100', 'regex:/^[A-Za-z\s]+$/', 'not_regex:/^\.+$/'],
            'jabatan'  => ['required', 'string', 'max:100', 'regex:/^[A-Za-z\s]+$/', 'not_regex:/^\.+$/'],
            'email'    => ['required', 'email', 'max:100', 'unique:hrs,email,' . $id],
            'password' => ['nullable', 'string', 'min:6'],
        ]);

        try {
            $hr = HR::findOrFail($id);

            $hr->nama = $request->nama;
            $hr->jabatan = $request->jabatan;
            $hr->email = $request->email;

            if ($request->filled('password')) {
                $hr->password = Hash::make($request->password);
            }

            $hr->save();

            Log::info('Data HR ID ' . $id . ' berhasil diperbarui.');
            return redirect()->route('hr.show', $id)->with('success', 'Data HR berhasil diperbarui.');
        } catch (Throwable $e) {
            if (str_contains($e->getMessage(), 'Duplicate entry') && str_contains($e->getMessage(), 'hrs_email_unique')) {
                Log::warning('Percobaan update ke email yang sudah ada: ' . $request->email . ' untuk HR ID: ' . $id);
            }
            
            Log::error('Error memperbarui data HR: ' . $e->getMessage());
            return redirect()->route('hr.index')->withErrors('Data HR tidak ditemukan.');
        }
    }

    public function delete($id)
    {
        try {
            $hr = HR::findOrFail($id);
            return view('hr.delete', compact('hr'));
        } catch (Throwable $e) {
            Log::error('Error membuka halaman delete HR: ' . $e->getMessage());
            return redirect()->route('hr.index')->withErrors('Data HR tidak ditemukan.');
        }
    }

    public function destroy($id)
    {
        try {
            $hr = HR::findOrFail($id);
            $hr->forceDelete();
            Log::info('Data HR ID ' . $id . ' berhasil dihapus.');
            return redirect()->route('hr.index')->with('success', 'Data HR berhasil dihapus.');
        } catch (Throwable $e) {
            Log::error('Error menghapus data HR: ' . $e->getMessage());
            return redirect()->route('hr.index')->withErrors('Data HR tidak ditemukan.');
        }
    }
}