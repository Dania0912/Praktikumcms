<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalKerjaTable extends Migration
{
    public function up()
    {
        Schema::create('jadwalkerja', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('karyawan_id'); // Foreign key
            $table->unsignedBigInteger('id_hrs');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->time('waktu_mulai');
            $table->time('waktu_selesai');
            $table->timestamps();
        
            $table->foreign('karyawan_id')->references('id')->on('karyawan')->onDelete('cascade');
            $table->foreign('id_hrs')->references('id')->on('hrs')->onDelete('cascade');
        });
        
        
    }

    public function down()
    {
        Schema::dropIfExists('jadwalkerja');
    }
}
