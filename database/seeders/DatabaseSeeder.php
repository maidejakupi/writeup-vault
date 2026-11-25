<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Writeup;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // A known user so you can log in while testing
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Writeup::factory(8)->for($user)->create();

        // Other users, each with their own writeups
        User::factory(5)
            ->has(Writeup::factory()->count(6))
            ->create();
    }
}
