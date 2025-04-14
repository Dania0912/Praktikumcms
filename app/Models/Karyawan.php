<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = 'karyawan'; // nama tabel
    
    protected $fillable = [
        'ID_Karyawan', 
        'Nama', 
        'Tanggal_Lahir', 
        'Alamat', 
        'Jabatan', 
        'Riwayat_Pekerjaan'
    ];

    protected $casts = [
        'Tanggal_Lahir' => 'datetime',
    ];
    

    protected $primaryKey = 'ID_Karyawan';
    public $incrementing = false;
    protected $keyType = 'string';

    // Fungsi untuk menghitung umur
    public function getUmurAttribute()
    {
        return $this->Tanggal_Lahir->age;
    }
}