<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $roles = [
            env('SUPER_ADMIN_LABEL', 'Super Admin'), 
            env('ADMIN_LABEL', 'Admin'), 
            env('EDITOR_LABEL', 'Editor'), 
            env('INSTRUCTOR_LABEL', 'Instructor'), 
            env('STUDENT_LABEL', 'Student')
        ];

        foreach ($roles as $role)
        {
            App\Models\Role::create([
                'name' => $role,
            ]);
        }
    }
}
