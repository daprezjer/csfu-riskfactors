<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSmokingModelIndicatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('smoking_model_indicators', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('model_id')->unsigned();
            $table->bigInteger('indicator_id')->unsigned();
            $table->decimal('coefficient', 4,3);
            $table->decimal('significance', 4,3)->unsigned();
            $table->timestamps();

            $table->foreign('model_id')->references('id')->on('smoking_models');
            $table->foreign('indicator_id')->references('id')->on('smoking_indicators');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('smoking_model_indicators');
    }
}
