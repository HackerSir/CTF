<?php
// About
Breadcrumbs::register('about', function ($breadcrumbs) {
    $breadcrumbs->push('關於我們', route('profile'));
});

// Topic
Breadcrumbs::register('topic.index', function ($breadcrumbs) {
    $breadcrumbs->push('題目', route('profile'));
});

// Profile
Breadcrumbs::register('profile', function ($breadcrumbs) {
    $breadcrumbs->push('個人資料', route('profile'));
});
Breadcrumbs::register('profile.edit', function ($breadcrumbs) {
    $breadcrumbs->parent('profile');
    $breadcrumbs->push('編輯個人資料', route('profile'));
});
Breadcrumbs::register('profile.change-password', function ($breadcrumbs) {
    $breadcrumbs->parent('profile');
    $breadcrumbs->push('修改密碼', route('profile'));
});

// User
Breadcrumbs::register('user.index', function ($breadcrumbs) {
    $breadcrumbs->push('會員清單', route('user.index'));
});
Breadcrumbs::register('user.show', function ($breadcrumbs, $user) {
    $breadcrumbs->parent('user.index');
    $breadcrumbs->push($user->name, route('user.show', $user));
});
Breadcrumbs::register('user.edit', function ($breadcrumbs, $user) {
    $breadcrumbs->parent('user.show', $user);
    $breadcrumbs->push('編輯會員資料', route('user.edit', $user));
});

// Permission & Role
Breadcrumbs::register('permission.index', function ($breadcrumbs) {
    $breadcrumbs->push('權限與角色', route('permission.index'));
});
Breadcrumbs::register('role.create', function ($breadcrumbs) {
    $breadcrumbs->parent('permission.index');
    $breadcrumbs->push('新增角色', route('role.create'));
});
Breadcrumbs::register('role.edit', function ($breadcrumbs, $role) {
    $breadcrumbs->parent('permission.index');
    $breadcrumbs->push($role->name);
    $breadcrumbs->push('編輯角色', route('role.edit', $role));
});

//Auth
Breadcrumbs::register('auth.login', function ($breadcrumbs) {
    $breadcrumbs->push('登入', route('auth.login'));
});
Breadcrumbs::register('auth.register', function ($breadcrumbs) {
    $breadcrumbs->push('註冊', route('auth.register'));
});

Breadcrumbs::register('auth.password.reset', function ($breadcrumbs) {
    $breadcrumbs->push('重設密碼', route('auth.password.reset'));
});
Breadcrumbs::register('auth.resend-confirm-mail', function ($breadcrumbs) {
    $breadcrumbs->push('重新發送驗證信件', route('auth.password.reset'));
});
