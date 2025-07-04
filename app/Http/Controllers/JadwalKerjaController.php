<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalKerja;
use App\Models\Karyawan;
use App\Models\HR;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Carbon\Carbon;
use Throwable;

class JadwalKerjaController extends Controller
{
    public function index(Request $request)
    {
        try {
            $search = $request->input('search');
            $jadwalkerja = JadwalKerja::with('karyawan');

            if ($search) {
                $jadwalkerja->whereHas('karyawan', function ($query) use ($search) {
                    $query->where('nama', 'like', "%{$search}%");
                });
            }

            $result = $jadwalkerja->get();
            Log::info('Data jadwal kerja ditampilkan.', ['search' => $search]);
            return view('jadwalkerja.index', [
                'jadwalkerja' => $result,
                'search' => $search
            ]);
        } catch (Throwable $e) {
            Log::error('Gagal menampilkan data jadwal kerja.', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return redirect()->back()->withErrors('Gagal menampilkan data jadwal kerja.');
        }
    }

    public function create()
    {
        try {
            $karyawans = Karyawan::all();
            $hrs = HR::all();
            Log::info('Form tambah jadwal kerja dibuka.');
            return view('jadwalkerja.create', compact('karyawans', 'hrs'));
        } catch (Throwable $e) {
            Log::error('Gagal membuka form tambah jadwal kerja.', [
                'message' => $e->getMessage()
            ]);
            return redirect()->route('jadwalkerja.index')->withErrors('Gagal memuat form tambah jadwal kerja.');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id'     => 'required',
            'id_hrs'          => 'required',
            'tanggal_mulai'   => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'waktu_mulai'     => 'required|regex:/^\d{2}:\d{2}$/|date_format:H:i',
            'waktu_selesai'   => 'required|regex:/^\d{2}:\d{2}$/|date_format:H:i|after:waktu_mulai',
        ]);

        try {
            DB::insert("
                INSERT INTO JADWALKERJA (
                    KARYAWAN_ID, ID_HRS, TANGGAL_MULAI, TANGGAL_SELESAI, 
                    WAKTU_MULAI, WAKTU_SELESAI, CREATED_AT, UPDATED_AT
                ) VALUES (
                    :karyawan_id, :id_hrs,
                    TO_DATE(:tanggal_mulai, 'YYYY-MM-DD'),
                    TO_DATE(:tanggal_selesai, 'YYYY-MM-DD'),
                    TO_DATE(:waktu_mulai, 'HH24:MI:SS'),
                    TO_DATE(:waktu_selesai, 'HH24:MI:SS'),
                    SYSDATE, SYSDATE
                )
            ", [
                'karyawan_id'     => $request->karyawan_id,
                'id_hrs'          => $request->id_hrs,
                'tanggal_mulai'   => $request->tanggal_mulai,
                'tanggal_selesai' => $request->tanggal_selesai,
                'waktu_mulai'     => Carbon::parse($request->waktu_mulai)->format('H:i:s'),
                'waktu_selesai'   => Carbon::parse($request->waktu_selesai)->format('H:i:s'),
            ]);

            Log::info('Jadwal kerja berhasil ditambahkan.', $request->all());
            return redirect()->route('jadwalkerja.index')->with('success', 'Jadwal kerja berhasil ditambahkan');
        } catch (Throwable $e) {
            Log::error('Gagal menambahkan jadwal kerja.', [
                'message' => $e->getMessage(),
                'input' => $request->all()
            ]);
            return redirect()->route('jadwalkerja.index')->withErrors('Gagal menambahkan data jadwal kerja.');
        }
    }

    public function show($id)
    {
        try {
            $jadwalkerja = JadwalKerja::findOrFail($id);
            Log::info("Detail jadwal kerja ID {$id} ditampilkan.");
            return view('jadwalkerja.show', compact('jadwalkerja'));
        } catch (ModelNotFoundException $e) {
            Log::warning("Jadwal kerja ID {$id} tidak ditemukan.");
            return redirect()->route('jadwalkerja.index')->withErrors('Data jadwal kerja tidak ditemukan.');
        }
    }

    public function edit($id)
    {
        try {
            $jadwalkerja = JadwalKerja::findOrFail($id);
            $karyawans = Karyawan::all();
            $hrs = HR::all();
            Log::info("Form edit jadwal kerja ID {$id} dibuka.");
            return view('jadwalkerja.edit', compact('jadwalkerja', 'karyawans', 'hrs'));
        } catch (ModelNotFoundException $e) {
            Log::warning("Gagal membuka form edit. Jadwal kerja ID {$id} tidak ditemukan.");
            return redirect()->route('jadwalkerja.index')->withErrors('Data jadwal kerja tidak ditemukan');
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_hrs'          => 'required',
            'tanggal_mulai'   => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'waktu_mulai'     => 'required|regex:/^\d{2}:\d{2}$/|date_format:H:i',
            'waktu_selesai'   => 'required|regex:/^\d{2}:\d{2}$/|date_format:H:i|after:waktu_mulai',
        ]);

        try {
            DB::statement("
                UPDATE JADWALKERJA SET
                    ID_HRS = :id_hrs,
                    TANGGAL_MULAI = TO_DATE(:tanggal_mulai, 'YYYY-MM-DD'),
                    TANGGAL_SELESAI = TO_DATE(:tanggal_selesai, 'YYYY-MM-DD'),
                    WAKTU_MULAI = TO_DATE(:waktu_mulai, 'HH24:MI:SS'),
                    WAKTU_SELESAI = TO_DATE(:waktu_selesai, 'HH24:MI:SS'),
                    UPDATED_AT = SYSDATE
                WHERE ID = :id
            ", [
                'id_hrs'          => $request->id_hrs,
                'tanggal_mulai'   => $request->tanggal_mulai,
                'tanggal_selesai' => $request->tanggal_selesai,
                'waktu_mulai'     => Carbon::parse($request->waktu_mulai)->format('H:i:s'),
                'waktu_selesai'   => Carbon::parse($request->waktu_selesai)->format('H:i:s'),
                'id'              => $id,
            ]);

            Log::info("Jadwal kerja ID {$id} berhasil diperbarui.", $request->all());
            return redirect()->route('jadwalkerja.show', $id)->with('success', 'Data berhasil diperbarui');
        } catch (Throwable $e) {
            Log::error("Gagal memperbarui jadwal kerja ID {$id}.", [
                'message' => $e->getMessage(),
                'input' => $request->all()
            ]);
            return redirect()->route('jadwalkerja.index')->withErrors('Gagal memperbarui data jadwal kerja.');
        }
    }

    public function delete($id)
    {
        try {
            $jadwalkerja = JadwalKerja::with(['karyawan', 'hrs'])->findOrFail($id);
            Log::info("Form konfirmasi hapus jadwal kerja ID {$id} dibuka.");
            return view('jadwalkerja.delete', compact('jadwalkerja'));
        } catch (ModelNotFoundException $e) {
            Log::warning("Gagal membuka form delete. Jadwal kerja ID {$id} tidak ditemukan.");
            return redirect()->route('jadwalkerja.index')->withErrors('Data jadwal kerja tidak ditemukan.');
        }
    }

    public function destroy($id)
    {
        try {
            $jadwalkerja = JadwalKerja::findOrFail($id);
            $jadwalkerja->delete();
            Log::info("Jadwal kerja ID {$id} berhasil dihapus.");
            return redirect()->route('jadwalkerja.index')->with('success', 'Data jadwal kerja berhasil dihapus');
        } catch (ModelNotFoundException $e) {
            Log::warning("Gagal menghapus. Jadwal kerja ID {$id} tidak ditemukan.");
            return redirect()->route('jadwalkerja.index')->withErrors('Data jadwal kerja tidak ditemukan.');
        }
    }
}
