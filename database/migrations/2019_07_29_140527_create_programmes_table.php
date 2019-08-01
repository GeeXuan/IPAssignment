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
            $table->string('progId', 5)->primary();
            $table->string('progName');
            $table->text('progDesc');
            $table->string('profession');
            $table->integer('durationStudy');
            $table->string('progLevel');
            $table->decimal('facilitiesFee');
            $table->unsignedBigInteger('facultyid');
            $table->unsignedBigInteger('levelofstudyid');
            $table->foreign('facultyid')->references('id')->on('faculties')->onDelete('cascade');
            $table->foreign('levelofstudyid')->references('id')->on('level_of_studies')->onDelete('cascade');
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
