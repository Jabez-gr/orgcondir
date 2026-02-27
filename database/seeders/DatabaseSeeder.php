<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Industries;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // User::factory(10)->create();
        User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => Hash::make('password123'), // Add a hashed password
            ]
        );

        Industries::factory()->count(10)->create();
    }
}
