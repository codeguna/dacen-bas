<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'administrator']);
        $role->givePermissionTo('users_manage');
        $role->givePermissionTo('delete_tendik');
        $role->givePermissionTo('delete_dosen');
        $role->givePermissionTo('create_tendik');
        $role->givePermissionTo('update_tendik');
        $role->givePermissionTo('show_tendik');
        $role->givePermissionTo('create_dosen');
        $role->givePermissionTo('update_dosen');
        $role->givePermissionTo('show_dosen');
        $role->givePermissionTo('set_status_tendik');
        $role->givePermissionTo('set_status_dosen');
        $role->givePermissionTo('add_education_dosen');
        $role->givePermissionTo('add_jabfung_dosen');
        $role->givePermissionTo('add_inpassing_dosen');
        $role->givePermissionTo('add_certificate_dosen');
        $role->givePermissionTo('delete_education_dosen');
        $role->givePermissionTo('delete_jabfung_dosen');
        $role->givePermissionTo('delete_inpassing_dosen');
        $role->givePermissionTo('delete_certificate_dosen');
        $role->givePermissionTo('add_education_tendik');
        $role->givePermissionTo('add_certificate_tendik');
        $role->givePermissionTo('delete_education_tendik');
        $role->givePermissionTo('delete_certificate_tendik');
        $role->givePermissionTo('bas_menu');

        $role = Role::create(['name' => 'bas']);
        $role->givePermissionTo('create_tendik');
        $role->givePermissionTo('update_tendik');
        $role->givePermissionTo('show_tendik');
        $role->givePermissionTo('create_dosen');
        $role->givePermissionTo('update_dosen');
        $role->givePermissionTo('show_dosen');
        $role->givePermissionTo('set_status_tendik');
        $role->givePermissionTo('set_status_dosen');
        $role->givePermissionTo('add_education_dosen');
        $role->givePermissionTo('add_jabfung_dosen');
        $role->givePermissionTo('add_inpassing_dosen');
        $role->givePermissionTo('add_certificate_dosen');
        $role->givePermissionTo('delete_education_dosen');
        $role->givePermissionTo('delete_jabfung_dosen');
        $role->givePermissionTo('delete_inpassing_dosen');
        $role->givePermissionTo('delete_certificate_dosen');
        $role->givePermissionTo('add_education_tendik');
        $role->givePermissionTo('add_certificate_tendik');
        $role->givePermissionTo('delete_education_tendik');
        $role->givePermissionTo('delete_certificate_tendik');
        $role->givePermissionTo('bas_menu');
        $role->givePermissionTo('efs_menu');
        $role->givePermissionTo('create_letter');
        $role->givePermissionTo('read_letter');
        $role->givePermissionTo('update_letter');
        $role->givePermissionTo('delete_letter');

        $role = Role::create(['name' => 'GUEST']);
        $role->givePermissionTo('view_profile');
        $role->givePermissionTo('view_attendances');
        $role->givePermissionTo('create_attendances');

        $role->givePermissionTo('create_employee_developments');
        $role->givePermissionTo('read_employee_developments');
        $role->givePermissionTo('update_employee_developments');
        $role->givePermissionTo('delete_employee_developments');

        $role = Role::create(['name' => 'KOORDINATOR']);
        $role->givePermissionTo('view_profile');
        $role->givePermissionTo('view_attendances');
        $role->givePermissionTo('create_attendances');
        $role->givePermissionTo('view_presences');
        
        $role->givePermissionTo('create_employee_developments');
        $role->givePermissionTo('read_employee_developments');
        $role->givePermissionTo('update_employee_developments');
        $role->givePermissionTo('delete_employee_developments');
        $role->givePermissionTo('approve_employee_developments');
        $role->givePermissionTo('menu_employee_developments');
        $role->givePermissionTo('report_employee_developments');
        
    }
}