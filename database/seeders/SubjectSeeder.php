<?php

namespace Database\Seeders;

use App\Models\Subject;
use Database\Factories\SubjectFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subject::factory()->count(10)->create();
    }
}
