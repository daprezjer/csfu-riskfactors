<?php

use Illuminate\Database\Seeder;

class SmokingForecastsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('smoking_forecasts')->insert([
            [
                'year' => 2018,
                'forecast' => .118,
                'ci_75_lo' => .114,
                'ci_75_hi' => .122,
                'ci_90_lo' => .112,
                'ci_90_hi' => .124,
                'ci_95_lo' => .11,
                'ci_95_hi' => .125,
                'ci_99_lo' => .108,
                'ci_99_hi' => .128
            ],
            [
                'year' => 2019,
                'forecast' => .107,
                'ci_75_lo' => .102,
                'ci_75_hi' => .111,
                'ci_90_lo' => .100,
                'ci_90_hi' => .113,
                'ci_95_lo' => .099,
                'ci_95_hi' => .114,
                'ci_99_lo' => .097,
                'ci_99_hi' => .117
            ],
            [
                'year' => 2020,
                'forecast' => .097,
                'ci_75_lo' => .092,
                'ci_75_hi' => .101,
                'ci_90_lo' => .09,
                'ci_90_hi' => .103,
                'ci_95_lo' => .089,
                'ci_95_hi' => .104,
                'ci_99_lo' => .087,
                'ci_99_hi' => .106
            ],
            [
                'year' => 2021,
                'forecast' => .087,
                'ci_75_lo' => .083,
                'ci_75_hi' => .092,
                'ci_90_lo' => .081,
                'ci_90_hi' => .094,
                'ci_95_lo' => .08,
                'ci_95_hi' => .095,
                'ci_99_lo' => .077,
                'ci_99_hi' => .097
            ],
            [
                'year' => 2022,
                'forecast' => .079,
                'ci_75_lo' => .075,
                'ci_75_hi' => .083,
                'ci_90_lo' => .073,
                'ci_90_hi' => .085,
                'ci_95_lo' => .071,
                'ci_95_hi' => .087,
                'ci_99_lo' => .069,
                'ci_99_hi' => .089
            ]
        ]);
    }
}
