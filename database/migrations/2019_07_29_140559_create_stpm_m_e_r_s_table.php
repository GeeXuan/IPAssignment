<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStpmMERSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stpm_m_e_r_s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('stpmSubjectName');
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
        Schema::dropIfExists('stpm_m_e_r_s');
    }
}
