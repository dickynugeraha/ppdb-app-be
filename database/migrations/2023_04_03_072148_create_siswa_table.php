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
        Schema::create('siswas', function (Blueprint $table) {
            $table->char("nisn", 10)->primary();
            $table->string("asal_sekolah");
            $table->string("email");
            $table->string("password");
            $table->string("nama");
            $table->string("alamat");
            $table->string("no_hp_ortu");
            $table->string("jenis_kelamin");
            $table->string("foto_profil")->nullable();
            $table->string("foto_akte")->nullable();
            $table->string("foto_ijazah")->nullable();
            $table->string("foto_kk")->nullable();
            $table->string("foto_ktp_ortu")->nullable();
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
        Schema::dropIfExists('siswa');
    }
};
