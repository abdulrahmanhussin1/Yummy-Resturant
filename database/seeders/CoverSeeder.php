<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CoverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('covers')->insert([
            'title'=>Str::random(20),
            'description'=>Str::random(200),
            'image'=>Str::random(20).'.jpg',
            'video'=>Str::random(20).'.mp4',
            'user_id'=>'1'
        ]);
    }
}
