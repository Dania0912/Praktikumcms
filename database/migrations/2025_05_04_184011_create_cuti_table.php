<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCutiTable extends Migration
{
    public function up()
    {
        Schema::create('cuti', function (Blueprint $table) {
            $table->id(); // ID auto-increment
            $table->unsignedBigInteger('karyawan_id'); // Foreign key
            $table->unsignedBigInteger('id_hrs');
            $table->string('keterangan_cuti');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->timestamps();

            // Hanya gunakan foreign key yang sesuai dengan nama kolom
            $table->foreign('karyawan_id')->references('id')->on('karyawan')->onDelete('cascade');
            $table->foreign('id_hrs')->references('id')->on('hrs')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('cuti');
    }
}
