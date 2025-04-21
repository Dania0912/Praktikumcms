<?php

namespace App\Models;

class Cuti
{
    public $ID_Cuti;
    public $Tanggal_Mulai;
    public $Tanggal_Selesai;
    public $Keterangan_Cuti;

    public function __construct($ID_Cuti, $Tanggal_Mulai, $Tanggal_Selesai, $Keterangan_Cuti)
    {
        $this->ID_Cuti = $ID_Cuti;
        $this->Tanggal_Mulai = $Tanggal_Mulai;
        $this->Tanggal_Selesai = $Tanggal_Selesai;
        $this->Keterangan_Cuti = $Keterangan_Cuti;
    }
}