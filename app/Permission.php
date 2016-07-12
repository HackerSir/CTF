<?php

namespace App;

use Zizaco\Entrust\EntrustPermission;

/**
 * 權限
 *
 * @package App
 *
 * @property-read integer id
 * @property string name
 * @property string display_name
 * @property string description
 *
 * @property \Illuminate\Database\Eloquent\Collection|Role[]|null roles
 *
 * @property \Carbon\Carbon|null created_at
 * @property \Carbon\Carbon|null updated_at
 */
class Permission extends EntrustPermission
{
    protected $fillable = [
        'name',
        'display_name',
        'description'
    ];

    /**
     * @param $roleName
     *
     * @return bool
     */
    public function hasRole($roleName)
    {
        foreach ($this->roles as $role) {
            if ($role->name == $roleName) {
                return true;
            }
        }
        return false;
    }
}
