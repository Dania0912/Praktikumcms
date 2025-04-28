<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HR;

class HRController extends Controller
{
    protected static $hrList = [];

    private function seed()
    {
        if (empty(self::$hrList)) {
            self::$hrList = [
                new HR('HR01', 'Dania', 'Manager'),
                new HR('HR02', 'Budi', 'Staff')
            ];
        }
    }

    public function index()
    {
        $this->seed();
        return view('hr.index', ['hr' => self::$hrList]);
    }

    public function create()
    {
        return view('hr.create');
    }

    public function store(Request $request)
    {
        $this->seed();

        // Validasi input dari form
        $request->validate([
            'ID_HR' => 'required|unique:hr,ID_HR',
            'Nama' => 'required|max:255',
            'Jabatan' => 'required|max:255'
        ]);

        $hr = new HR($request->ID_HR, $request->Nama, $request->Jabatan);
        self::$hrList[] = $hr;

        return redirect()->route('hr.index')->with('success', 'HR berhasil ditambahkan.');
    }

    public function show($id)
    {
        $this->seed();
        $hr = collect(self::$hrList)->firstWhere('ID_HR', $id);
        return view('hr.show', ['hr' => $hr]);
    }

    public function edit($id)
    {
        $this->seed();
        $hr = collect(self::$hrList)->firstWhere('ID_HR', $id);
        return view('hr.edit', ['hr' => $hr]);
    }

    public function update(Request $request, $id)
    {
        $this->seed();

        $request->validate([
            'Nama' => 'required|max:255',
            'Jabatan' => 'required|max:255'
        ]);

        foreach (self::$hrList as $key => $hr) {
            if ($hr->ID_HR === $id) {
                self::$hrList[$key]->Nama = $request->Nama;
                self::$hrList[$key]->Jabatan = $request->Jabatan;
            }
        }

        return redirect()->route('hr.index')->with('success', 'HR berhasil diperbarui.');
    }

    public function confirmDelete($id)
    {
        $this->seed();
        $hr = collect(self::$hrList)->firstWhere('ID_HR', $id);
        return view('hr.delete', ['hr' => $hr]);
    }

    public function destroy($id)
    {
        $this->seed();
        self::$hrList = array_filter(self::$hrList, function ($hr) use ($id) {
            return $hr->ID_HR !== $id;
        });

        return redirect()->route('hr.index')->with('success', 'HR berhasil dihapus.');
    }
}
