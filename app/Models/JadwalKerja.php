<?php

namespace App\Models;

class JadwalKerja
{
    public $ID_Jadwal;
    public $Tanggal_Mulai;
    public $Tanggal_Selesai;
    public $Waktu_Mulai;
    public $Waktu_Selesai;

    public function __construct($id, $tanggalMulai, $tanggalSelesai, $waktuMulai, $waktuSelesai)
    {
        $this->ID_Jadwal = $id;
        $this->Tanggal_Mulai = $tanggalMulai;
        $this->Tanggal_Selesai = $tanggalSelesai;
        $this->Waktu_Mulai = $waktuMulai;
        $this->Waktu_Selesai = $waktuSelesai;
    }
}