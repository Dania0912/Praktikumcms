<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('penggajian', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('karyawan_id');
            $table->unsignedBigInteger('id_hrs');
            $table->decimal('gaji_pokok', 15, 2);
            $table->decimal('potongan', 15, 2)->default(0);
            $table->decimal('bonus', 15, 2)->default(0);
            $table->text('catatan')->nullable();
            $table->timestamps();
        
            $table->foreign('karyawan_id')->references('id')->on('karyawan')->onDelete('cascade');
            $table->foreign('id_hrs')->references('id')->on('hrs')->onDelete('cascade');
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('penggajian');
    }
};
