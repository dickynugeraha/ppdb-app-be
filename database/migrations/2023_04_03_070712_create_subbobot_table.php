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
        Schema::create('sub_bobots', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->smallInteger("bobot");
            $table->string("keterangan");
            $table->string("parameter_id");
            $table->foreign("parameter_id")->references("id")->on("parameters")->onDelete("cascade");
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
        Schema::dropIfExists('sub_bobot');
    }
};
