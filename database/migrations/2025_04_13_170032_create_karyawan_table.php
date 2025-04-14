<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('karyawan', function (Blueprint $table) {
            $table->id(); // ID otomatis (primary key)
            $table->string('ID_Karyawan', 10)->unique();
            $table->string('Nama', 100);
            $table->date('Tanggal_Lahir');
            $table->text('Alamat');
            $table->string('Jabatan', 50);
            $table->text('Riwayat_Pekerjaan')->nullable();
            $table->timestamps(); // created_at & updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('karyawan');
    }
};