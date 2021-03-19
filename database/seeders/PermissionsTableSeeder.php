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
                'title' => 'doctors_message_approvel_access',
            ],
            [
                'id'    => 31,
                'title' => 'provider_messages_approval_access',
            ],
            [
                'id'    => 32,
                'title' => 'send_payment_link_access',
            ],
            [
                'id'    => 33,
                'title' => 'send_zoom_link_access',
            ],
            [
                'id'    => 34,
                'title' => 'setting_create',
            ],
            [
                'id'    => 35,
                'title' => 'setting_edit',
            ],
            [
                'id'    => 36,
                'title' => 'setting_show',
            ],
            [
                'id'    => 37,
                'title' => 'setting_delete',
            ],
            [
                'id'    => 38,
                'title' => 'setting_access',
            ],
            [
                'id'    => 39,
                'title' => 'send_redacted_cv_to_provider_access',
            ],
            [
                'id'    => 40,
                'title' => 'view_providers_message_access',
            ],
            [
                'id'    => 41,
                'title' => 'view_zoom_link_access',
            ],
            [
                'id'    => 42,
                'title' => 'chat_with_provider_access',
            ],
            [
                'id'    => 43,
                'title' => 'update_information_access',
            ],
            [
                'id'    => 44,
                'title' => 'contact_with_admin_access',
            ],
            [
                'id'    => 45,
                'title' => 'view_doctors_message_access',
            ],
            [
                'id'    => 46,
                'title' => 'view_admin_message_access',
            ],
            [
                'id'    => 47,
                'title' => 'select_meeting_time_access',
            ],
            [
                'id'    => 48,
                'title' => 'chat_with_admin_access',
            ],
            [
                'id'    => 49,
                'title' => 'chat_with_doctor_access',
            ],
            [
                'id'    => 50,
                'title' => 'view_meeting_link_access',
            ],
            [
                'id'    => 51,
                'title' => 'agreement_completion_access',
            ],
            [
                'id'    => 52,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
