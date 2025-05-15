<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class JadwalKerja extends Model
{
    protected $table = 'jadwalkerja'; // pastikan sesuai nama tabel di database
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'karyawan_id',
        'id_hrs',
        'tanggal_mulai',
        'tanggal_selesai',
        'waktu_mulai',
        'waktu_selesai',
    ];

    // 👇 Supaya format tanggal dan waktu pas tanpa error
    protected $casts = [
        'tanggal_mulai'   => 'date:Y-m-d',
        'tanggal_selesai' => 'date:Y-m-d',
        'waktu_mulai'     => 'datetime:H:i:s',
        'waktu_selesai'   => 'datetime:H:i:s',
    ];

    // Relasi ke karyawan
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'karyawan_id');
    }

    // Relasi ke HR
    public function hrs()
    {
        return $this->belongsTo(HR::class, 'id_hrs');
    }
}
