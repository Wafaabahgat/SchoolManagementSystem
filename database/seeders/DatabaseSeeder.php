<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            // 'email' => 'superadmin@admin.com',
            'role' => 'admin',
            'email_verified_at' => now(),
            'password' => Hash::make('112233'),
        ]);
        $user = User::create([
            'name' => 'Instructor',
            'email' => 'instructor@gmail.com',
            'role' => 'instructor',
            'email_verified_at' => now(),
            'password' => Hash::make('112233'),
        ]);
        $student = User::create([
            'name' => 'Student',
            'email' => 'student@gmail.com',
            'role' => 'student',
            'email_verified_at' => now(),
            'password' => Hash::make('112233'),
        ]);
        $parent = User::create([
            'name' => 'Parent',
            'email' => 'parent@gmail.com',
            'role' => 'parent',
            'email_verified_at' => now(),
            'password' => Hash::make('112233'),
        ]);
    }
}
