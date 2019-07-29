<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpmMERSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spm_m_e_r_s', function (Blueprint $table) {
            $table->bigIncrements('spmMERId');
            $table->string('spmSubjectName');
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
        Schema::dropIfExists('spm_m_e_r_s');
    }
}
