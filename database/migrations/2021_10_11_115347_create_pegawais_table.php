<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nip')->unique();
            $table->string('nama', 100);
            $table->string('alamat', 100);
            $table->string('jenis_kel', 1);
            $table->string('agama', 1);
            $table->string('telepon', 20);
            $table->string('email');
            $table->string('file_foto', 20);
            $table->bigInteger('jabatan_id')->unsigned()->nullable();
            $table->foreign('jabatan_id')->references('id')->on('jabatans')->onDelete('cascade');
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
        Schema::dropIfExists('pegawais');
    }
}
