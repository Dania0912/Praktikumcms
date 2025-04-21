<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penggajian;

class PenggajianController extends Controller
{
    protected static $penggajianList = [];

    private function seed()
    {
        if (empty(self::$penggajianList)) {
            self::$penggajianList = [
                new Penggajian('PGJ001', 5000000, 500000, 200000, 'Gaji bulan April'),
                new Penggajian('PGJ002', 4500000, 300000, 150000, 'Gaji bulan April dengan bonus')
            ];
        }
    }

    public function index()
    {
        $this->seed();
        return view('penggajian.index', ['penggajian' => self::$penggajianList]);
    }

    public function create()
    {
        return view('penggajian.create');
    }

    public function store(Request $request)
    {
        $this->seed();
        $request->validate([
            'ID_Penggajian' => 'required',
            'Gaji_Pokok' => 'required|numeric',
            'Potongan' => 'required|numeric',
            'Bonus' => 'required|numeric',
            'Catatan' => 'required'
        ]);

        $penggajian = new Penggajian(
            $request->ID_Penggajian,
            $request->Gaji_Pokok,
            $request->Potongan,
            $request->Bonus,
            $request->Catatan
        );

        self::$penggajianList[] = $penggajian;

        return redirect()->route('penggajian.index')->with('success', 'Data penggajian berhasil ditambahkan.');
    }

    public function show($id)
    {
        $this->seed();
        $penggajian = collect(self::$penggajianList)->firstWhere('ID_Penggajian', $id);
        return view('penggajian.show', ['penggajian' => $penggajian]);
    }

    public function edit($id)
    {
        $this->seed();
        $penggajian = collect(self::$penggajianList)->firstWhere('ID_Penggajian', $id);
        return view('penggajian.edit', ['penggajian' => $penggajian]);
    }

    public function update(Request $request, $id)
    {
        $this->seed();
        foreach (self::$penggajianList as $key => $penggajian) {
            if ($penggajian->ID_Penggajian === $id) {
                self::$penggajianList[$key]->Gaji_Pokok = $request->Gaji_Pokok;
                self::$penggajianList[$key]->Potongan = $request->Potongan;
                self::$penggajianList[$key]->Bonus = $request->Bonus;
                self::$penggajianList[$key]->Catatan = $request->Catatan;
            }
        }

        return redirect()->route('penggajian.index')->with('success', 'Data penggajian berhasil diperbarui.');
    }

    public function confirmDelete($id)
    {
        $this->seed();
        $penggajian = collect(self::$penggajianList)->firstWhere('ID_Penggajian', $id);
        return view('penggajian.delete', ['penggajian' => $penggajian]);
    }

    public function destroy($id)
    {
        $this->seed();
        self::$penggajianList = array_filter(self::$penggajianList, function ($penggajian) use ($id) {
            return $penggajian->ID_Penggajian !== $id;
        });

        return redirect()->route('penggajian.index')->with('success', 'Data penggajian berhasil dihapus.');
    }
}
