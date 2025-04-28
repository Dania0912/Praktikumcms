<?php

namespace App\Models;

class Karyawan
{
    public $ID_Karyawan;
    public $Nama;
    public $Tanggal_Lahir;
    public $Alamat;
    public $Jabatan;
    public $Riwayat_Pekerjaan;

    public function __construct($ID_Karyawan, $Nama, $Tanggal_Lahir, $Alamat, $Jabatan, $Riwayat_Pekerjaan)
    {
        $this->ID_Karyawan = $ID_Karyawan;
        $this->Nama = $Nama;
        $this->Tanggal_Lahir = $Tanggal_Lahir;
        $this->Alamat = $Alamat;
        $this->Jabatan = $Jabatan;
        $this->Riwayat_Pekerjaan = $Riwayat_Pekerjaan;
    }
}