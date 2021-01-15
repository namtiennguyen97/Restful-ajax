<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::create([
            'id' => 1,
            'name' => 'Project Manager',
            'salary' => 8000
        ]);
        Department::create([
            'id' => 2,
            'name' => 'Team Leader',
            'salary' => 4000
        ]);
        Department::create([
            'id' => 3,
            'name' => 'Tester',
            'salary' => 7000
        ]);
    }
}
