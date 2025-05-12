<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalKerjaTable extends Migration
{
    public function up()
    {
        Schema::create('jadwalkerja', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('karyawan_id'); // Foreign key relasi (opsional)
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->time('waktu_mulai');
            $table->time('waktu_selesai');
            $table->timestamps(); // created_at and updated_at
            $table->foreign('karyawan_id')->references('id')->on('karyawan')->onDelete('cascade');

        });
        
    }

    public function down()
    {
        Schema::dropIfExists('jadwalkerja');
    }
}
