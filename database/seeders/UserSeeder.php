<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'user1@example.com'], // unique field
            [
                'name' => 'User 1',
                'password' => Hash::make('password123'),
                'role' => 2,
            ]
        );

        User::updateOrCreate(
            ['email' => 'user2@example.com'], // unique field
            [
                'name' => 'User 2',
                'password' => Hash::make('password123'),
                'role' => 2,
            ]
        );
    }
}
