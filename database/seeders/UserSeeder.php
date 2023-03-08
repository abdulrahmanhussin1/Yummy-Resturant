<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin 1',
            'email' => 'admin1@test.com',
            'password' => Hash::make('admin1234'),
            'role_id'=>'1',
            'image'=>'1.jpg',
            'phone'=>'0123456789'
        ]);
    }
}
