<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $table = 'karyawan'; 
    protected $fillable = ['nama', 'tanggal_lahir', 'alamat', 'jabatan', 'riwayat_pekerjaan'];

    protected $primaryKey = 'id'; 

    public $incrementing = false; 
    protected $keyType = 'string';

    public static function getAll()
    {
        return Karyawan::all();
    }

    public static function find($id)
    {
        return Karyawan::where('id', $id)->first();
    }
}