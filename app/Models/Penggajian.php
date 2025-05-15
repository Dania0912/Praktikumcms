<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penggajian extends Model
{
    use HasFactory;

    protected $table = 'penggajian'; // Menyesuaikan dengan nama tabel yang benar
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'karyawan_id',
        'gaji_pokok',
        'potongan',
        'bonus',
        'catatan',
        'id_hrs'  // Menambahkan id_hrs untuk hubungan dengan HR
    ];

    // Relasi ke Karyawan
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'karyawan_id');
    }

    // Relasi ke HR
    public function hr()
    {
        return $this->belongsTo(HR::class, 'id_hrs');
    }

    // Jika ingin menggunakan ID khusus dalam route, Anda bisa menambahkan ini
    public function getRouteKeyName()
    {
        return 'id'; // Menyesuaikan dengan nama primary key yang digunakan
    }
}
