<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
          'name' => 'Elfan Hari Saputra',
          'email' => 'user@gmail.com',
          'password' => bcrypt('password'),
        ]);
        Todo::factory(20)->create([
          'user_id' => 1
        ]);
    }
}
