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
        Schema::create('nilais', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->char("nisn", 10);
            $table->string("parameter_id");
            $table->string("nama_parameter");
            $table->foreign("parameter_id")->references("id")->on("parameters")->onDelete("cascade");
            $table->float("nilai");
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
        Schema::dropIfExists('nilai');
    }
};
