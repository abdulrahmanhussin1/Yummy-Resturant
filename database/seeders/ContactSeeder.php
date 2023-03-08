<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacts')->insert([
            'map'=>Str::random(20),
            'address'=>Str::random(20),
            'email'=>Str::random(20).'gmail.com',
            'phone'=>'+1234567890',
            'hours'=>Str::random(20),
            'user_id'=>'1'
        ]);
    }
}
