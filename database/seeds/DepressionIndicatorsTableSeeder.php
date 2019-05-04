<?php

use Illuminate\Database\Seeder;

class DepressionIndicatorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('depression_indicators')->insert([
            ['variable' => 'male'],
            ['variable' => 'parent_awareness'],
            ['variable' => 'religious'],
            ['variable' => 'black'],
            ['variable' => 'father_present'],
            ['variable' => 'hispanic'],
            ['variable' => 'parent_college_degree'],
            ['variable' => 'north_east'],
            ['variable' => 'grade_level']
        ]);

        DB::table('depression_indicators')->insert([
            ['id' => 99, 'variable' => 'constant']
        ]);
    }
}
