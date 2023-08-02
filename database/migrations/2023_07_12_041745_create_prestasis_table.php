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
        Schema::create('prestasis', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->char("nisn", 10);
            $table->string("nilai_semester");
            $table->string("nilai_uas");
            $table->string("nilai_un");
            $table->string("prestasi_akademik");
            $table->string("prestasi_non_akademik");
            $table->foreign("nisn")->references("nisn")->on("siswas")->onDelete("cascade");
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
        Schema::dropIfExists('prestasis');
    }
};
