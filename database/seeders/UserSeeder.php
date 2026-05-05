<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
            'name' => Str::random(10),
            'email' => 'admin@email.com',
            'password' => Hash::make('adminFoodHunt12'),
            'username' => 'admin',
            'roles' => 'ADMIN'
        ]);

        DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => 'user@email.com',
            'password' => Hash::make('password'),
            'username' => 'user',
            'roles' => 'USER'
        ]);
    }
}
