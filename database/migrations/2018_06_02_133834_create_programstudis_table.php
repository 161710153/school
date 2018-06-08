<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramstudisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programstudis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_program');
            $table->UnsignedInteger('fasilitas_id');
            $table->foreign('fasilitas_id')->references('id')->on('fasilitas')->onDelete('CASCADE');
            $table->UnsignedInteger('industris_id');
            $table->foreign('industris_id')->references('id')->on('industris')->onDelete('CASCADE');
            $table->UnsignedInteger('strukturs_id');
            $table->foreign('strukturs_id')->references('id')->on('strukturs')->onDelete('CASCADE');
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
        Schema::dropIfExists('programstudis');
    }
}
