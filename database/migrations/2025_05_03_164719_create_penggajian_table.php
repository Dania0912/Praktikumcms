<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('penggajian', function (Blueprint $table) {
            $table->id(); // ID default: id
            $table->unsignedBigInteger('karyawan_id'); // Foreign key relasi (opsional)
            $table->decimal('gaji_pokok', 15, 2);
            $table->decimal('potongan', 15, 2)->default(0);
            $table->decimal('bonus', 15, 2)->default(0);
            $table->text('catatan')->nullable();
            $table->timestamps();

            // Jika ada relasi ke tabel karyawan
            $table->foreign('karyawan_id')->references('id')->on('karyawan')->onDelete('cascade');
        });
    }

    public function down()
{
    Schema::dropIfExists('PENGGAJIAN');
}
};
