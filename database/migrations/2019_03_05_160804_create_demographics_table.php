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
            $table->unsignedInteger('grade_level');
            $table->unsignedTinyInteger('race')->nullable();
            $table->unsignedTinyInteger('gender')->nullable();
            $table->unsignedTinyInteger('depression')->nullable();
            $table->unsignedTinyInteger('depression_ind')->nullable()->default(null);
            $table->unsignedTinyInteger('smoke_recently')->nullable();
            $table->unsignedTinyInteger('smoke_ever')->nullable();
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
