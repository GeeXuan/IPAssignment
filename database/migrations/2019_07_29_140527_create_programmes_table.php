<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgrammesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programmes', function (Blueprint $table) {
            $table->string('progId', 5);
            $table->string('progName');
            $table->string('progDesc');
            $table->string('profession');
            $table->integer('durationStudy');
            $table->string('progLevel');
            $table->decimal('facilitiesFee');
            $table->unsignedBigInteger('facultyid');
            $table->foreign('facultyid')->references('id')->on('faculties');
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
        Schema::dropIfExists('programmes');
    }
}
