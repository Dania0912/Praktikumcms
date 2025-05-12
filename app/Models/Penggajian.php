<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penggajian extends Model
{

        use HasFactory;
    
        protected $table = 'PENGGAJIAN';
        protected $primaryKey = 'id';
        public $incrementing = true;
        protected $keyType = 'int';
    
        protected $fillable = [
            'karyawan_id',
            'gaji_pokok',
            'potongan',
            'bonus',
            'catatan',
        ];
    
    
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'karyawan_id');
    }

    public function getRouteKeyName()
    {
        return 'ID_Penggajian';
    }

}
