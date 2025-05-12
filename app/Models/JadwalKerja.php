<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalKerja extends Model
{
    use HasFactory;

    protected $table = 'jadwalkerja'; 
    protected $fillable = ['karyawan_id', 'tanggal_mulai', 'tanggal_selesai', 'waktu_mulai', 'waktu_selesai'];

    protected $primaryKey = 'id'; 

    public $incrementing = false; 
    protected $keyType = 'string';

    public static function getAll()
    {
        return JadwalKerja::all();
    }

    public static function find($id)
    {
        return JadwalKerja::where('id', $id)->first();
    }

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'karyawan_id');
    }
}