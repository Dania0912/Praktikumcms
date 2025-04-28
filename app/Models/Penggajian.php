<?php

namespace App\Models;

class Penggajian
{
    public $ID_Penggajian;
    public $Gaji_Pokok;
    public $Potongan;
    public $Bonus;
    public $Catatan;

    public function __construct($ID_Penggajian, $Gaji_Pokok, $Potongan, $Bonus, $Catatan)
    {
        $this->ID_Penggajian = $ID_Penggajian;
        $this->Gaji_Pokok = $Gaji_Pokok;
        $this->Potongan = $Potongan;
        $this->Bonus = $Bonus;
        $this->Catatan = $Catatan;
    }
}