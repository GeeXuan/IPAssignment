<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCgpaMERSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cgpa_m_e_r_s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cgpa');
            $table->unsignedBigInteger('merId');
            $table->foreign('merId')->references('merId')->on('m_e_r_s')->onDelete('cascade');
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
        Schema::dropIfExists('cgpa_m_e_r_s');
    }
}
