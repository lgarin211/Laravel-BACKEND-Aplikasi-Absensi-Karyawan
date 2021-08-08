<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogAbsensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_absens', function (Blueprint $table) {
            $table->string('NIP');
            $table->string('Nama_Guru');
            $table->string('Status');
            $table->date('TGL');
            $table->date('Absensi_Masuk');
            $table->date('Absensi_keluar');
            $table->string('Keterangan');
            $table->string('Gambar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_absens');
    }
}
