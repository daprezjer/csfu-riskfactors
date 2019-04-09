<?php

use Illuminate\Database\Seeder;

class IndicatorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('indicators')->insert([
            ['variable' => 'tenth_grade'],
            ['variable' => 'parent_awareness'],
            ['variable' => 'rural'],
            ['variable' => 'black'],
            ['variable' => 'father_present'],
            ['variable' => 'south'],
            ['variable' => 'parent_college_degrees'],
            ['variable' => 'hispanic'],
            ['variable' => 'religious'],
            ['variable' => 'male'],
            ['variable' => 'drug_education']
        ]);

        DB::table('indicators')->insert([
            ['id' => 99, 'variable' => 'constant']
        ]);
    }
}