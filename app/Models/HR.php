<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HR extends Authenticatable
{
    use HasFactory, Notifiable;

    // Tabel yang digunakan
    protected $table = 'hrs';

    // Kolom yang boleh diisi
    protected $fillable = [
        'nama',
        'jabatan',
        'email',
        'password',
    ];

    // Kolom yang disembunyikan saat model dikonversi ke array atau JSON
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Jika kamu memang ingin ID-nya string dan manual, pertahankan ini.
    // Tapi jika ID kamu auto-increment (default Laravel), hapus tiga baris di bawah ini.
    protected $primaryKey = 'id';
    public $incrementing = true; // Ubah ke true jika ID auto-increment
    protected $keyType = 'int';  // Ubah ke 'int' jika pakai auto-increment

    // Custom helper (opsional)
    public static function getAll()
    {
        return self::all();
    }

    public static function find($id)
    {
        return self::where('id', $id)->first();
    }
}
