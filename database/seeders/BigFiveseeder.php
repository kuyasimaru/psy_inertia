<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BigFiveseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('big_fives')->insert(
            [
                'member_id'=> 1,
                'openness' => 2.8,
                'agreeableness'=> 3.5,
                'extraversion'=> 4.3,
                'conscientiousness'=> 2.9,
                'neuroticism'=> 4.0,
                'created_at'=>now(),
                'updated_at'=> now(),
            ]);
    }
}
