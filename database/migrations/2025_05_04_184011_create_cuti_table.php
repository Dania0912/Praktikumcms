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
            $table->unsignedBigInteger('karyawan_id'); // Foreign key relasi (opsional)
            $table->string('keterangan_cuti'); // Menambahkan kolom keterangan_cuti
            $table->date('tanggal_mulai'); // Kolom untuk tanggal mulai cuti
            $table->date('tanggal_selesai'); // Kolom untuk tanggal selesai cuti
            $table->timestamps(); // Menambahkan kolom timestamps (created_at, updated_at)
            $table->foreign('karyawan_id')->references('id')->on('karyawan')->onDelete('cascade');

        });
    }

    public function down()
    {
        Schema::dropIfExists('cuti'); // Drop tabel cuti jika rollback
    }
}
