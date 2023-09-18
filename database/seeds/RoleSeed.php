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
        
    }
}