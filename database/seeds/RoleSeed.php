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
    }
}