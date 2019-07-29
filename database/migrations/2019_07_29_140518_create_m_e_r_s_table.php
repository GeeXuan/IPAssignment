<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMERSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_e_r_s', function (Blueprint $table) {
            $table->bigIncrements('merId');
            $table->boolean('spmRequired');
            $table->boolean('olevelRequired');
            $table->decimal('cgpaRequired');
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
        Schema::dropIfExists('m_e_r_s');
    }
}
