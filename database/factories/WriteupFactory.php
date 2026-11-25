<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class WriteupFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'title' => fake()->sentence(4),
            'category' => fake()->randomElement(['Web', 'Crypto', 'Forensics', 'Pwn', 'Reverse Engineering', 'OSINT', 'Misc']),
            'difficulty' => fake()->randomElement(['Easy', 'Medium', 'Hard']),
            'body' => fake()->paragraphs(4, true),
        ];
    }
}
