<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penggajian extends Model
{
    use HasFactory;

    // Menentukan nama tabel sesuai dengan yang ada di database
    protected $table = 'PENGGAJIAN';  // Pastikan ini sesuai dengan nama tabel di database

    // Menentukan kolom yang bisa diisi (mass assignable)
    protected $fillable = [
        'gaji_pokok',
        'potongan',
        'bonus',
        'catatan',
    ];
}
