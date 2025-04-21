<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Penggajian;
use App\Models\HR;
use App\Models\JadwalKerja;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $karyawanCount = Karyawan::count();
        $penggajianCount = Penggajian::count();
        $hrCount = HR::count();
        $jadwalKerjaCount = JadwalKerja::count();

        return view('home', compact('karyawanCount', 'penggajianCount', 'hrCount', 'jadwalKerjaCount'));
    }
}
