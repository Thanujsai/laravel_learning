<?php

namespace Database\Seeders;

use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'first_name' => 'Thanuj',
            'last_name' => 'Sai',
            'email' => 'thanuj@gmail.com',
        ]);

        $this->call(JobSeeder::class);

        $this->call(PostSeeder::class);
    }
}
