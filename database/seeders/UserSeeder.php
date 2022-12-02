<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \DB::table('roles')->insert([
            ['role_name'=>'writer'],
            ['role_name'=>'reader'],
        ]);

        DB::table('users')->insert([
            'name' => 'User1',
            'email' => 'user1@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 1,
        ]);
    }
}
