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
        Schema::create('raports', function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->float("semester_2");
            $table->float("semester_3");
            $table->float("semester_4");
            $table->float("semester_5");
            $table->float("semester_6");
            $table->float("nilai_uas");
            $table->string("transkrip_nilai");
            $table->string("nisn");
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
        Schema::dropIfExists('raports');
    }
};
