<?php

use App\Role;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Permission;

class CreateMenuViewPermission extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $permMenuView = Permission::create([
            'name'         => 'menu.view',
            'display_name' => '檢視選單',
            'description'  => '看到管理員選單',
        ]);


        /** @var Role $admin */
        $admin = Role::where('name', 'admin')->first();
        $admin->attachPermission($permMenuView);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Permission::where('name', 'menu.view')->delete();
    }
}
