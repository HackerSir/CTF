<?php

namespace App;

use Zizaco\Entrust\EntrustRole;

/**
 * 角色
 *
 * @package Hackersir
 *
 * @property-read integer id
 * @property string name
 * @property string display_name
 * @property string description
 *
 * @property \Carbon\Carbon|null created_at
 * @property \Carbon\Carbon|null updated_at
 */
class Role extends EntrustRole
{
    protected $fillable = [
        'name',
        'display_name',
        'description'
    ];
}
