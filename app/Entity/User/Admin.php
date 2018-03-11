<?php

namespace App\Entity\User;

use App\Entity\Base\User;
use App\Scopes\CMSCore\UserRoleScope;

class Admin extends User {
    protected static function boot() {
        static::addGlobalScope(new UserRoleScope(User::ROLE_ADMIN));
        parent::boot();
    }
    const FORM_REQUIRED = ['name', 'email'];
    const INDEX_FIELD = [
        'name','email', 'phone'
    ];
    const FORM_TYPE = [
        'name' => 'Text',
        'email'  => 'Text',
        'password'  => 'Password',
    ];
    const FORM_DISABLED = ['email'];
	const URL_DETAILS = '/admin/user';
}
