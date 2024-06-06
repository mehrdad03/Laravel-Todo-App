<?php

namespace Database\Seeders;

use App\Models\Todo;
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
        $users = User::factory(20)->create();

        $users->random(20)->each(function ($user) {
            Todo::factory(10)->create(['user_id' => $user->id]);
        });

    }
}
