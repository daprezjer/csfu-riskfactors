<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SmokingIndicatorsTableSeeder::class);
        $this->call(SmokingModelsTableSeeder::class);
        $this->call(SmokingForecastsTableSeeder::class);
        $this->call(DepressionIndicatorsTableSeeder::class);
        $this->call(DepressionModelsTableSeeder::class);
        $this->call(DepressionForecastsTableSeeder::class);
    }
}
