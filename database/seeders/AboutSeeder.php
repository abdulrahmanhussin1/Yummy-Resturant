<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('abouts')->insert([
            'title'=>Str::random(20),
            'desc'=>Str::random(200),
            'image'=>Str::random(20).'.jpg',
            'background_image'=>Str::random(20).'.jpg',
            'video'=>Str::random(20).'.mp4',
            'contact'=>Str::random(20),
            'phone'=>'+12345678901',
            'user_id'=>'1'
        ]);
    }
}
