<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGajisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gajis', function (Blueprint $table) {
            $table->id();
            $table->integer('tahun');
            $table->integer('bulan');
            $table->bigInteger('pegawai_id')->unsigned()->nullable();
            $table->foreign('pegawai_id')->references('id')->on('pegawais')->onDelete('cascade');
            $table->bigInteger('gaji_pokok')->nullable();
            $table->bigInteger('tunjangan')->nullable();
            $table->bigInteger('potongan')->nullable();
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
        Schema::dropIfExists('gajis');
    }
}
