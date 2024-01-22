<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class fakeusers extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('users')->truncate();

        $users = [
            [
                'username' => 'admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'first_name' => 'Admin',
                'last_name' => 'User',
                'phone' => '123456789',
                'dob' => '1990-01-01',
            ],
            [
                'username' => 'user1',
                'email' => 'user1@example.com',
                'password' => Hash::make('password'),
                'first_name' => 'John',
                'last_name' => 'Doe',
                'phone' => '987654321',
                'dob' => '1985-05-15',
            ]
        ];

        DB::table('users')->insert($users);
    }
}
