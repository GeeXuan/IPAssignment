<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOlevelMERSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('olevel_m_e_r_s', function (Blueprint $table) {
            $table->bigIncrements('olevelMERId');
            $table->string('olevelSubjectName');
            $table->unsignedBigInteger('merId');
            $table->foreign('merId')->references('merId')->on('m_e_r_s');
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
        Schema::dropIfExists('olevel_m_e_r_s');
    }
}
