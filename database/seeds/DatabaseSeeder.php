<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
            'is_admin' => 0,
            'garage_id' => rand(0, 2),
            'balance' => rand(100, 900),
            'order_count' => rand(1, 20),
            'phone' => rand(111111111, 999999999)
        ]);

        DB::table('statuses')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
            'is_admin' => 0,
            'garage_id' => rand(0, 2),
            'balance' => rand(100, 900),
            'order_count' => rand(1, 20),
            'phone' => rand(111111111, 999999999)
        ]);
    
    }
}
