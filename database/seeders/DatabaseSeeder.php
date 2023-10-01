<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use PHPUnit\Event\Test\TestStubCreated;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::truncate();

        User::factory()->create(
            [
                'name' => 'Admin User',
                'email' => 'admin@admin.com',
                'password' => bcrypt('admin@admin.com'),

            ]
        );

        // call CustomerSeeder
        $this->call(CustomerSeeder::class);

        $this->call(SubjectSeeder::class);

        $this->call(EmployeeSeeder::class);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
