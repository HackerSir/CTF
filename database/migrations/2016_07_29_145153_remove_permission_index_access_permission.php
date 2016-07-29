<?php

use App\Permission;
use App\Role;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemovePermissionIndexAccessPermission extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Permission::where('name', 'permission.index.access')->delete();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $permPermissionIndexAccess = Permission::create([
            'name'         => 'permission.index.access',
            'display_name' => '進入權限面板',
            'description'  => '進入權限面板，查看各角色權限清單'
        ]);

        /** @var Role $admin */
        $admin = Role::where('name', 'admin')->first();
        $admin->attachPermission($permPermissionIndexAccess);
    }
}
