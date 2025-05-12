<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    use HasFactory;

    protected $table = 'cuti'; // Menyesuaikan dengan nama tabel yang benar
    protected $fillable = ['karyawan_id','tanggal_mulai', 'tanggal_selesai', 'keterangan_cuti'];

    protected $primaryKey = 'id'; // Menyertakan primary key
    public $incrementing = false; // Menyesuaikan dengan tipe data primary key
    protected $keyType = 'string'; // Jika id menggunakan tipe data string

    // Method untuk mendapatkan semua data cuti
    public static function getAll()
    {
        return Cuti::all();
    }

    // Method untuk mencari cuti berdasarkan id
    public static function find($id)
    {
        return Cuti::where('id', $id)->first();
    }
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'karyawan_id');
    }
}
