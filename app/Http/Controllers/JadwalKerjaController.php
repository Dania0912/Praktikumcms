<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalKerja;

class JadwalKerjaController extends Controller
{
    protected static $jadwalKerjaList = [];

    private function seed()
    {
        if (empty(self::$jadwalKerjaList)) {
            self::$jadwalKerjaList = [
                new JadwalKerja('J01', '2025-05-01', '2025-05-01', '08:00', '17:00'),
                new JadwalKerja('J02', '2025-05-02', '2025-05-02', '09:00', '18:00')
            ];
        }
    }

    public function index()
    {
        $this->seed();
        return view('jadwalkerja.index', ['jadwalKerja' => self::$jadwalKerjaList]);
    }

    public function create()
    {
        return view('jadwalkerja.create');
    }

    public function store(Request $request)
    {
        $this->seed();
        $request->validate([
            'ID_Jadwal' => 'required',
            'Tanggal_Mulai' => 'required|date',
            'Tanggal_Selesai' => 'required|date',
            'Waktu_Mulai' => 'required',
            'Waktu_Selesai' => 'required'
        ]);

        $jadwal = new JadwalKerja(
            $request->ID_Jadwal,
            $request->Tanggal_Mulai,
            $request->Tanggal_Selesai,
            $request->Waktu_Mulai,
            $request->Waktu_Selesai
        );

        self::$jadwalKerjaList[] = $jadwal;

        return redirect()->route('jadwalkerja.index')->with('success', 'Jadwal kerja berhasil ditambahkan.');
    }

    public function show($id)
    {
        $this->seed();
        $jadwal = collect(self::$jadwalKerjaList)->firstWhere('ID_Jadwal', $id);
        return view('jadwalkerja.show', ['jadwalKerja' => $jadwal]);
    }

    public function edit($id)
    {
        $this->seed();
        $jadwal = collect(self::$jadwalKerjaList)->firstWhere('ID_Jadwal', $id);
        return view('jadwalkerja.edit', ['jadwalKerja' => $jadwal]);
    }

    public function update(Request $request, $id)
    {
        $this->seed();
        foreach (self::$jadwalKerjaList as $key => $jadwal) {
            if ($jadwal->ID_Jadwal === $id) {
                self::$jadwalKerjaList[$key]->Tanggal_Mulai = $request->Tanggal_Mulai;
                self::$jadwalKerjaList[$key]->Tanggal_Selesai = $request->Tanggal_Selesai;
                self::$jadwalKerjaList[$key]->Waktu_Mulai = $request->Waktu_Mulai;
                self::$jadwalKerjaList[$key]->Waktu_Selesai = $request->Waktu_Selesai;
            }
        }
        return redirect()->route('jadwalkerja.index')->with('success', 'Jadwal kerja berhasil diperbarui.');
    }

    public function confirmDelete($id)
    {
        $this->seed();
        $jadwal = collect(self::$jadwalKerjaList)->firstWhere('ID_Jadwal', $id);
        return view('jadwalkerja.delete', ['jadwalKerja' => $jadwal]);
    }

    public function destroy($id)
    {
        $this->seed();
        self::$jadwalKerjaList = array_filter(self::$jadwalKerjaList, function ($jadwal) use ($id) {
            return $jadwal->ID_Jadwal !== $id;
        });

        return redirect()->route('jadwalkerja.index')->with('success', 'Jadwal kerja berhasil dihapus.');
    }
}
