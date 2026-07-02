<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
<<<<<<< HEAD
use Illuminate\Support\Facades\Hash;
=======

>>>>>>> origin/online_library
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
<<<<<<< HEAD
            'name' => 'Admin',
            'email' => 'admin@online-library.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
=======
            'name' => 'Test User',
            'email' => 'test@example.com',
>>>>>>> origin/online_library
        ]);
    }
}
