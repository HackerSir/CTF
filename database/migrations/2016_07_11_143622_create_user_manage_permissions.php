<?php

use App\Permission;
use App\Role;
use Illuminate\Database\Migrations\Migration;

class CreateUserManagePermissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $permUserManage = Permission::create([
            'name'         => 'user.manage',
            'display_name' => '管理會員',
            'description'  => '修改會員資料、調整會員權限、刪除會員等',
        ]);

        $permUserView = Permission::create([
            'name'         => 'user.view',
            'display_name' => '查看會員資料',
            'description'  => '查看會員清單、資料、權限等',
        ]);

        /** @var Role $admin */
        $admin = Role::where('name', 'admin')->first();
        $admin->attachPermission($permUserManage);
        $admin->attachPermission($permUserView);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Permission::where('name', 'user.manage')->delete();
        Permission::where('name', 'user.view')->delete();
    }
}
