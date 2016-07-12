<?php

use App\Permission;
use App\Role;
use Illuminate\Database\Schema\Blueprint;
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
        $permission = Permission::create([
            'name'         => 'permission.index.access',
            'display_name' => '進入權限面板',
            'description'  => '進入權限面板，查看各角色權限清單'
        ]);

        $role = Role::where('name', 'admin')->first();
        $role->attachPermission($permission);
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
