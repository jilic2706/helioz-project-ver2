<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Department::factory(7)->create();

        \App\Models\User::factory(10)->create();

        \App\Models\LeaveRequest::factory(5)->create();

        \App\Models\User::factory()->create([
            'name' => 'J. C. Denton',
            'email' => 'jc@example.com',
        ]);
    }
}
