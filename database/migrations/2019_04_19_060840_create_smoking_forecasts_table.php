<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSmokingForecastsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('smoking_forecasts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('year')->unsigned();
            $table->decimal('forecast',4,3)->unsigned();
            $table->decimal('ci_75_lo',4,3)->unsigned();
            $table->decimal('ci_75_hi',4,3)->unsigned();
            $table->decimal('ci_90_lo',4,3)->unsigned();
            $table->decimal('ci_90_hi',4,3)->unsigned();
            $table->decimal('ci_95_lo',4,3)->unsigned();
            $table->decimal('ci_95_hi',4,3)->unsigned();
            $table->decimal('ci_99_lo',4,3)->unsigned();
            $table->decimal('ci_99_hi',4,3)->unsigned();
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
        Schema::dropIfExists('smoking_forecasts');
    }
}
