<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDemographicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demographics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('case_id');
            $table->unsignedInteger('year');
            $table->unsignedInteger('form_id');
            $table->unsignedInteger('respondent_id');
            $table->unsignedDecimal('sample_weight',7, 6);
            $table->unsignedInteger('grade_level');
            $table->unsignedInteger('region');
            $table->unsignedTinyInteger('urban');
            $table->unsignedTinyInteger('msa');
            $table->unsignedTinyInteger('race')->nullable();
            $table->unsignedTinyInteger('age')->nullable();
            $table->unsignedTinyInteger('gender')->nullable();
            $table->unsignedTinyInteger('depression')->nullable();
            $table->unsignedTinyInteger('smoke')->nullable();
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
        Schema::dropIfExists('demographics');
    }
}
