<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Permission::create(['name' => 'user_index']);
        Permission::create(['name' => 'user_show']);
        Permission::create(['name' => 'user_store']);
        Permission::create(['name' => 'user_update']);
        Permission::create(['name' => 'user_destroy']);
        Permission::create(['name' => 'ticket_show']);

        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo(
            [
                'user_index',
                'user_show',
                'user_store',
                'user_update',
                'user_destroy',
                'ticket_show',
            ]
        );
        $developer = Role::create(['name' => 'developer']);
        $developer->givePermissionTo(
            [
                'user_index',
                'user_show',
                'user_store',
                'user_update',
                'user_destroy',
                'ticket_show',
            ]
        );


        $user = Role::create(['name' => 'user']);
        $user->givePermissionTo(
            [
                'user_show',
                'user_store',
                'user_update',
            ]
        );

        $superAdmin = Role::create(['name' => 'Super-Admin']);
    }
}
