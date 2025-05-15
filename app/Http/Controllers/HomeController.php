<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Penggajian;
use App\Models\Cuti;
use App\Models\HR;
use App\Models\JadwalKerja;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'karyawanCount' => Karyawan::count(),
            'penggajianCount' => Penggajian::count(),
            'hrCount' => Hr::count(),
            'cutiCount' => Cuti::count(),
            'jadwalKerjaCount' => JadwalKerja::count(),
        ]);
    }
}
