<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PermissionRoleTableSeeder extends Seeder
{
    public function run()
    {
        $supper_admin_permissions = Permission::all();
        Role::findOrFail(1)->permissions()->sync($supper_admin_permissions->pluck('id'));
        
        $admin_permissions = $supper_admin_permissions->filter(function ($permission) {
            $doctor_permissions_array = ['view_doctors_message_access','view_admin_message_access','select_meeting_time_access','chat_with_admin_access','chat_with_doctor_access','view_meeting_link_access','agreement_completion_access','view_providers_message_access','view_zoom_link_access','chat_with_provider_access','update_information_access','contact_with_admin_access'];
            return !in_array($permission->title, $doctor_permissions_array) && substr($permission->title, 0, 5) != 'user_' && substr($permission->title, 0, 5) != 'role_' && substr($permission->title, 0, 11) != 'permission_';
        });
        Role::findOrFail(2)->permissions()->sync($admin_permissions);
        

        $doctor_permissions = $supper_admin_permissions->filter(function ($permission) {
            $doctor_permissions_array = ['view_providers_message_access','view_zoom_link_access','chat_with_provider_access','update_information_access','contact_with_admin_access'];
            return in_array($permission->title, $doctor_permissions_array) && substr($permission->title, 0, 5) != 'user_' && substr($permission->title, 0, 5) != 'role_' && substr($permission->title, 0, 11) != 'permission_';
        });
        Role::findOrFail(3)->permissions()->sync($doctor_permissions);
        
        $provider_permissions = $supper_admin_permissions->filter(function ($permission) {
            $provider_permissions_array = ['view_doctors_message_access','view_admin_message_access','select_meeting_time_access','chat_with_admin_access','chat_with_doctor_access','view_meeting_link_access','agreement_completion_access'];
            return in_array($permission->title, $provider_permissions_array) && substr($permission->title, 0, 5) != 'user_' && substr($permission->title, 0, 5) != 'role_' && substr($permission->title, 0, 11) != 'permission_';
        });
        Role::findOrFail(4)->permissions()->sync($provider_permissions);

    }
}
