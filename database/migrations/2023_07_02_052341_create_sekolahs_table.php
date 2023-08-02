<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sekolahs', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("nama");
            $table->string("deskripsi");
            $table->string("foto_logo");
            $table->string("foto_identitas");
            $table->string("foto_alur_pendaftaran");
            $table->dateTime("pendaftaran_buka");
            $table->dateTime("pendaftaran_tutup");
            $table->dateTime("pengumuman_seleksi");
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
        Schema::dropIfExists('sekolahs');
    }
};
