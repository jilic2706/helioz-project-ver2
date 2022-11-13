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

        \App\Models\Department::factory()->create([
            'name' => 'Human Resources'
        ]);

        for($i = 1; $i < 5; $i++) {
            \App\Models\User::factory()->create([
                'dept_id' => $i
            ]);
            \App\Models\LeaveRequest::factory(3)->create([
                'user_id' => $i
            ]);
        }

        $basic_user = \App\Models\User::factory()->create([
            'name' => 'Gordon Freeman',
            'email' => 'gf@example.com',
        ]);

        \App\Models\LeaveRequest::factory(5)->create([
            'user_id' => $basic_user->id
        ]);

        $dept_head_user = \App\Models\User::factory()->create([
            'name' => 'Guy Guyvers',
            'is_dept_head' => true,
            'email' => 'gg@example.com',
        ]);

        \App\Models\LeaveRequest::factory(3)->create([
            'user_id' => $dept_head_user->id
        ]);

        $admin_user = \App\Models\User::factory()->create([
            'name' => 'Dukie Nukie',
            'role' => 'admin',
            'dept_id' => 6,
            'email' => 'dn@example.com',
        ]);

        \App\Models\LeaveRequest::factory(2)->create([
            'user_id' => $admin_user->id
        ]);
    }
}
