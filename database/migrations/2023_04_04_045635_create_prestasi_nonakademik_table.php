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
        Schema::create('prestasi_nonakademiks', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->char("nisn", 10);
            $table->string("jenis");
            $table->string("juara_id");
            $table->foreign("nisn")->references("nisn")->on("siswas")->onDelete("cascade");
            $table->foreign("juara_id")->references("id")->on("juaras")->onDelete("cascade");
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
        Schema::dropIfExists('prestasi_nonakademik');
    }
};
