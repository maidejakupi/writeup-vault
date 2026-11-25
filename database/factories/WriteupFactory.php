<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class WriteupFactory extends Factory
{
    public function definition(): array
    {
        $category = fake()->randomElement(['Web', 'Crypto', 'Forensics', 'Pwn', 'Reverse Engineering', 'OSINT', 'Misc']);

        $titles = [
            'Bypassing the login with SQL injection',
            'Cracking a weak JWT secret',
            'Reading hidden data from a PCAP file',
            'Buffer overflow on a retro binary',
            'Finding the flag in image metadata',
            'Broken access control on the admin panel',
            'Decoding a multi-layer cipher',
            'Reversing a password checker',
            'Tracing a username across social media',
            'Escaping a restricted shell',
        ];

        $flag = 'THM{' . fake()->bothify('????_####') . '}';

        return [
            'user_id' => User::factory(),
            'title' => fake()->randomElement($titles),
            'category' => $category,
            'difficulty' => fake()->randomElement(['Easy', 'Medium', 'Hard']),
            'platform' => fake()->randomElement(['TryHackMe', 'HackTheBox', 'picoCTF', 'CTFtime', 'Other']),
            'body' => "Recon\nI started with an nmap scan and found port "
                . fake()->randomElement([22, 80, 443, 8080])
                . " open. A closer look at the service showed something interesting.\n\n"
                . "Exploitation\nAfter testing a few payloads, I got a foothold and found a hidden file with the next clue.\n\n"
                . "Flag\n{$flag}",
        ];
    }
}
