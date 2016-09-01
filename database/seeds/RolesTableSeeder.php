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

        $roles = ['Super Admin', 'Editor', 'Instructor', 'Admin', 'Staff', 'Student'];

        foreach ($roles as $role)
        {
            App\Models\Role::create([
                'name' => $role,
            ]);
        }
    }
}
