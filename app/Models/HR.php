<?php

namespace App\Models;

class HR
{
    public $ID_HR;
    public $Nama;
    public $Jabatan;

    public function __construct($id, $nama, $jabatan)
    {
        $this->ID_HR = $id;
        $this->Nama = $nama;
        $this->Jabatan = $jabatan;
    }
}