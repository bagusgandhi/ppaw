<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatPangkatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_pangkats', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('no_sk_jabatan');
            $table->bigInteger('gaji_pokok')->nullable();
            $table->integer('status');
            $table->bigInteger('pegawai_id')->unsigned()->nullable();
            $table->foreign('pegawai_id')->references('id')->on('pegawais')->onDelete('cascade');
            $table->bigInteger('mst_pangkat_id')->unsigned()->nullable();
            $table->foreign('mst_pangkat_id')->references('id')->on('mst_pangkats')->onDelete('cascade');
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
        Schema::dropIfExists('riwayat_pangkats');
    }
}
