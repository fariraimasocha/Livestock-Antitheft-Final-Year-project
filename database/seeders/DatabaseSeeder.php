<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Employee;
use Illuminate\Database\Seeder;
use App\Models\Livestock;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Livestock::factory(10)->create();
        Employee::factory(10)->create();

    }
}
