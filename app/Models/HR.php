<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HR extends Model
{
    use HasFactory;

    protected $table = 'hrs'; 
    protected $fillable = ['nama', 'jabatan'];

    protected $primaryKey = 'id'; 

    public $incrementing = false; 
    protected $keyType = 'string';

    public static function getAll()
    {
        return HR::all();
    }

    public static function find($id)
    {
        return HR::where('id', $id)->first();
    }
}