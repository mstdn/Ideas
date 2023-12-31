<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Idea;
use App\Models\Status;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Idea::factory(30)->create();

        // Status::factory()->create(['name' => 'Open', 'classes' => 'bg-gray-200']);
        // Status::factory()->create(['name' => 'Considering', 'classes' => 'bg-purple text-white']);
        // Status::factory()->create(['name' => 'In Progress', 'classes' => 'bg-yellow text-white']);
        // Status::factory()->create(['name' => 'Implemented', 'classes' => 'bg-green text-white']);
        // Status::factory()->create(['name' => 'Closed', 'classes' => 'bg-red text-white']);

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
