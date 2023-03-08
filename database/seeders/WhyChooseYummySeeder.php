<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;

class WhyChooseYummySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('why_choose_yummies')->insert([
            'title1'=>Str::random(20),
            'desc1'=>Str::random(500),
            'title2'=>Str::random(20),
            'desc2'=>Str::random(500),
            'title3'=>Str::random(20),
            'desc3'=>Str::random(500),
            'title4'=>Str::random(20),
            'desc4'=>Str::random(500),
            'user_id'=>'1'
        ]);
    }
}
