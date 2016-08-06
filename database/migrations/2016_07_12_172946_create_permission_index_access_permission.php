<?php

use App\Permission;
use App\Role;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionIndexAccessPermission extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $permPermissionIndexAccess = Permission::create([
            'name' => 'permission.index.access',
            'display_name' => '進入權限面板',
            'description' => '進入權限面板，查看各角色權限清單',
        ]);

        /** @var Role $admin */
        $admin = Role::where('name', 'admin')->first();
        $admin->attachPermission($permPermissionIndexAccess);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Permission::where('name', 'permission.index.access')->delete();
    }
}
