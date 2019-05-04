<?php

use Illuminate\Database\Seeder;

class DepressionModelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('depression_models')->insert([
            ['n' => 78241, 'r_squared' => 0.011],
            ['n' => 19778, 'r_squared' => 0.019],
            ['n' => 19629, 'r_squared' => 0.026],
            ['n' => 16378, 'r_squared' => 0.026],
            ['n' => 15953, 'r_squared' => 0.029],
            ['n' => 15953, 'r_squared' => 0.031],
            ['n' => 14040, 'r_squared' => 0.034],
            ['n' => 14040, 'r_squared' => 0.036],
            ['n' => 14040, 'r_squared' => 0.036]
        ]);
    }
}
