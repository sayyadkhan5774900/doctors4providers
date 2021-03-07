<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'doctor_create',
            ],
            [
                'id'    => 18,
                'title' => 'doctor_edit',
            ],
            [
                'id'    => 19,
                'title' => 'doctor_show',
            ],
            [
                'id'    => 20,
                'title' => 'doctor_delete',
            ],
            [
                'id'    => 21,
                'title' => 'doctor_access',
            ],
            [
                'id'    => 22,
                'title' => 'provider_create',
            ],
            [
                'id'    => 23,
                'title' => 'provider_edit',
            ],
            [
                'id'    => 24,
                'title' => 'provider_show',
            ],
            [
                'id'    => 25,
                'title' => 'provider_delete',
            ],
            [
                'id'    => 26,
                'title' => 'provider_access',
            ],
            [
                'id'    => 27,
                'title' => 'agreement_progress_access',
            ],
            [
                'id'    => 28,
                'title' => 'doctor_match_access',
            ],
            [
                'id'    => 29,
                'title' => 'redact_doctor_cv_access',
            ],
            [
                'id'    => 30,
                'title' => 'redacted_cv_access',
            ],
            [
                'id'    => 31,
                'title' => 'customize_notification_access',
            ],
            [
                'id'    => 32,
                'title' => 'doctors_message_approvel_access',
            ],
            [
                'id'    => 33,
                'title' => 'provider_messages_approval_access',
            ],
            [
                'id'    => 34,
                'title' => 'send_payment_link_access',
            ],
            [
                'id'    => 35,
                'title' => 'send_zoom_link_access',
            ],
            [
                'id'    => 36,
                'title' => 'setting_create',
            ],
            [
                'id'    => 37,
                'title' => 'setting_edit',
            ],
            [
                'id'    => 38,
                'title' => 'setting_show',
            ],
            [
                'id'    => 39,
                'title' => 'setting_delete',
            ],
            [
                'id'    => 40,
                'title' => 'setting_access',
            ],
            [
                'id'    => 41,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
