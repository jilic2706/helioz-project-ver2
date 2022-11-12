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
        \App\Models\Department::factory()->create([
            'name' => 'Information Technology'
        ]);

        \App\Models\Department::factory()->create([
            'name' => 'Public Relations'
        ]);

        \App\Models\Department::factory()->create([
            'name' => 'Quality Assurance'
        ]);

        \App\Models\Department::factory()->create([
            'name' => 'Research & Development'
        ]);

        \App\Models\Department::factory()->create([
            'name' => 'Anomalous Materials'
        ]);

        \App\Models\User::factory(10)->create();

        $user = \App\Models\User::factory()->create([
            'name' => 'Gordon Freeman',
            'email' => 'gf@example.com',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Caleb Blood',
            'email' => 'cb@example.com',
        ]);

        \App\Models\LeaveRequest::factory(5)->create([
            'user_id' => $user->id
        ]);
    }
}
