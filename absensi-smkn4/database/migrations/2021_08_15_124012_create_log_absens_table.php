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
            $table->id();
            $table->integer('id_user');
            $table->string('jam_masuk');
            $table->string('jam_keluar');
            $table->string('bukti_masuk')->nullable();
            $table->string('keterangan');
            // $table->string('id_user');
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
