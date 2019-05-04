<?php

use Illuminate\Database\Seeder;

class DepressionForecastsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('depression_forecasts')->insert([
            [
                'year' => 2018,
                'forecast' => .251,
                'ci_75_lo' => .228,
                'ci_75_hi' => .274,
                'ci_90_lo' => .218,
                'ci_90_hi' => .283,
                'ci_95_lo' => .212,
                'ci_95_hi' => .290,
                'ci_99_lo' => .199,
                'ci_99_hi' => .302
            ],
            [
                'year' => 2019,
                'forecast' => .260,
                'ci_75_lo' => .233,
                'ci_75_hi' => .287,
                'ci_90_lo' => .221,
                'ci_90_hi' => .299,
                'ci_95_lo' => .226,
                'ci_95_hi' => .313,
                'ci_99_lo' => .217,
                'ci_99_hi' => .322
            ],
            [
                'year' => 2020,
                'forecast' => .269,
                'ci_75_lo' => .239,
                'ci_75_hi' => .300,
                'ci_90_lo' => .226,
                'ci_90_hi' => .313,
                'ci_95_lo' => .231,
                'ci_95_hi' => .327,
                'ci_99_lo' => .201,
                'ci_99_hi' => .338
            ],
            [
                'year' => 2021,
                'forecast' => .279,
                'ci_75_lo' => .245,
                'ci_75_hi' => .313,
                'ci_90_lo' => .231,
                'ci_90_hi' => .327,
                'ci_95_lo' => .221,
                'ci_95_hi' => .336,
                'ci_99_lo' => .203,
                'ci_99_hi' => .355
            ],
            [
                'year' => 2022,
                'forecast' => .288,
                'ci_75_lo' => .252,
                'ci_75_hi' => .325,
                'ci_90_lo' => .236,
                'ci_90_hi' => .341,
                'ci_95_lo' => .226,
                'ci_95_hi' => .351,
                'ci_99_lo' => .206,
                'ci_99_hi' => .370
            ],
        ]);
    }
}
