<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuti;

class CutiController extends Controller
{
    protected static $cutiList = [];

    private function seed()
    {
        if (empty(self::$cutiList)) {
            self::$cutiList = [
                new Cuti('C001', '2025-04-01', '2025-04-05', 'Cuti Tahunan'),
                new Cuti('C002', '2025-04-10', '2025-04-12', 'Cuti Sakit')
            ];
        }
    }

    public function index()
    {
        $this->seed();
        return view('cuti.index', ['cuti' => self::$cutiList]);
    }

    public function create()
    {
        return view('cuti.create');
    }

    public function store(Request $request)
    {
        $this->seed();
        $request->validate([
            'ID_Cuti' => 'required',
            'Tanggal_Mulai' => 'required|date',
            'Tanggal_Selesai' => 'required|date|after_or_equal:Tanggal_Mulai',
            'Keterangan_Cuti' => 'required'
        ]);

        $cuti = new Cuti(
            $request->ID_Cuti,
            $request->Tanggal_Mulai,
            $request->Tanggal_Selesai,
            $request->Keterangan_Cuti
        );

        self::$cutiList[] = $cuti;

        return redirect()->route('cuti.index')->with('success', 'Data cuti berhasil ditambahkan.');
    }

    public function show($id)
    {
        $this->seed();
        $cuti = collect(self::$cutiList)->firstWhere('ID_Cuti', $id);
        return view('cuti.show', ['cuti' => $cuti]);
    }

    public function edit($id)
    {
        $this->seed();
        $cuti = collect(self::$cutiList)->firstWhere('ID_Cuti', $id);
        return view('cuti.edit', ['cuti' => $cuti]);
    }

    public function update(Request $request, $id)
    {
        $this->seed();
        foreach (self::$cutiList as $key => $cuti) {
            if ($cuti->ID_Cuti === $id) {
                self::$cutiList[$key]->Tanggal_Mulai = $request->Tanggal_Mulai;
                self::$cutiList[$key]->Tanggal_Selesai = $request->Tanggal_Selesai;
                self::$cutiList[$key]->Keterangan_Cuti = $request->Keterangan_Cuti;
            }
        }
        return redirect()->route('cuti.index')->with('success', 'Data cuti berhasil diperbarui.');
    }

    public function confirmDelete($id)
    {
        $this->seed();
        $cuti = collect(self::$cutiList)->firstWhere('ID_Cuti', $id);
        return view('cuti.delete', ['cuti' => $cuti]);
    }

    public function destroy($id)
    {
        $this->seed();
        self::$cutiList = array_filter(self::$cutiList, function ($cuti) use ($id) {
            return $cuti->ID_Cuti !== $id;
        });

        return redirect()->route('cuti.index')->with('success', 'Data cuti berhasil dihapus.');
    }
}
