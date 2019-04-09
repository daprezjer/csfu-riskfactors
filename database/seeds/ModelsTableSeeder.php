<?php

use Illuminate\Database\Seeder;

class ModelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('models')->insert([
            ['n' => 176063, 'r_squared' => 0.013],
            ['n' => 42926, 'r_squared' => 0.044],
            ['n' => 42926, 'r_squared' => 0.05],
            ['n' => 35443, 'r_squared' => 0.052],
            ['n' => 34483, 'r_squared' => 0.057],
            ['n' => 34483, 'r_squared' => 0.06],
            ['n' => 30159, 'r_squared' => 0.076],
            ['n' => 30159, 'r_squared' => 0.077],
            ['n' => 30159, 'r_squared' => 0.078],
            ['n' => 29746, 'r_squared' => 0.078],
            ['n' => 13823, 'r_squared' => 0.079]
        ]);
    }
}
