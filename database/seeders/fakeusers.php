<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class fakeusers extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {

        $users = [
            [
                'username' => 'admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'first_name' => 'Test',
                'last_name' => 'Admin',
                'phone' => '123456789',
                'dob' => '1990-01-01',
                'permission' => 'admin',
            ],
            [
                'username' => 'worker',
                'email' => 'worker@example.com',
                'password' => Hash::make('password'),
                'first_name' => 'Test',
                'last_name' => 'Worker',
                'phone' => '987654321',
                'dob' => '1985-05-15',
                'permission' => 'worker',
            ],
            [
                'username' => 'user',
                'email' => 'user1@example.com',
                'password' => Hash::make('password'),
                'first_name' => 'Test',
                'last_name' => 'User',
                'phone' => '987689221',
                'dob' => '1987-05-15',
                'permission' => 'user',
            ]
        ];

        DB::table('users')->insert($users);
    }
}
