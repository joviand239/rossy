<?php

namespace App\Entity\User;

use App\Entity\Base\User;
use App\Scopes\CMSCore\UserRoleScope;
use App\Util\Constant;

class Customer extends User {
    protected static function boot() {
        static::addGlobalScope(new UserRoleScope(Constant::USER_ROLE_CUSTOMER));
        parent::boot();
    }

    const STATUS_ACTIVE = 'ACTIVE';
    const STATUS_VERIFY = 'VERIFY';
    const STATUS_INACTIVE = 'INACTIVE';

    const INDEX_FIELD = [
        'name',
        'email',
        'phone',
        'status'
    ];

    const FORM_TYPE = [
        'first_name' => 'Text',
        'last_name' => 'Text',
        'email'  => 'Text',
        'phone'  => 'Number',
    ];


    public function customer_details(){
        return $this->hasOne(CustomerDetails::class, 'user_id');
    }
    public function getValue($key, $listItem, $language){
        if ($key == 'first_name') return $this->customer_details->first_name;
        if ($key == 'last_name') return $this->customer_details->last_name;
        if ($key == 'email') return $this->customer_details->email;
        if ($key == 'phone') return $this->customer_details->phone;
        return parent::getValue($key, $listItem, $language);
    }
}
