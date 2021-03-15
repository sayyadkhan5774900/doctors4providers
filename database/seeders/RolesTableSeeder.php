<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            [
                'id'    => 1,
                'title' => 'Supper',
            ],
            [
                'id'    => 2,
                'title' => 'Admin',
            ],
            [
                'id'    => 3,
                'title' => 'Doctor',
            ],
            [
                'id'    => 4,
                'title' => 'Provider',
            ],
            [
                'id'    => 5,
                'title' => 'User',
            ],
        ];

        Role::insert($roles);
    }
}
