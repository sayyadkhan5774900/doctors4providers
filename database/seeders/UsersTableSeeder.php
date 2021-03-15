<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'                 => 1,
                'name'               => 'Supper Admin',
                'email'              => 'supperadmin@admin.com',
                'password'           => bcrypt('supper@1234512345'),
                'remember_token'     => null,
                'approved'           => 1,
                'verified'           => 1,
                'verified_at'        => '2021-03-07 08:00:27',
                'verification_token' => '',
            ],
            [
                'id'                 => 2,
                'name'               => 'Admin',
                'email'              => 'admin@admin.com',
                'password'           => bcrypt('password'),
                'remember_token'     => null,
                'approved'           => 1,
                'verified'           => 1,
                'verified_at'        => '2021-03-07 08:00:27',
                'verification_token' => '',
            ],
            [
                'id'                 => 3,
                'name'               => 'Doctor',
                'email'              => 'doctor@doctor.com',
                'password'           => bcrypt('password'),
                'remember_token'     => null,
                'approved'           => 1,
                'verified'           => 1,
                'verified_at'        => '2021-03-07 08:00:27',
                'verification_token' => '',
            ],
            [
                'id'                 => 4,
                'name'               => 'Provider',
                'email'              => 'provider@provider.com',
                'password'           => bcrypt('password'),
                'remember_token'     => null,
                'approved'           => 1,
                'verified'           => 1,
                'verified_at'        => '2021-03-07 08:00:27',
                'verification_token' => '',
            ],
        ];

        User::insert($users);
    }
}
