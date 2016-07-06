<?php

namespace Hackersir;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @var array $fillable 可大量指派的屬性 */
    protected $fillable = [
        'name',
        'email',
        'password',
        'confirm_code',
        'confirm_at',
        'register_at',
        'register_ip',
        'last_login_at',
        'last_login_ip',
    ];

    /** @var array $hidden 於JSON隱藏的屬性 */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /** @var array $dates 自動轉換為Carbon的屬性 */
    protected $dates = ['confirm_at', 'register_at', 'last_login_at'];

    /** @var integer $perPage 分頁時的每頁數量 */
    protected $perPage = 50;

    /**
     * 帳號是否完成驗證
     *
     * @return boolean
     */
    public function getIsConfirmedAttribute()
    {
        return !empty($this->confirm_at);
    }
}
