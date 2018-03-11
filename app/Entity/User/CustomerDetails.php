<?php

namespace App\Entity\User;

use App\Entity\Base\User;
use App\Entity\Order;
use App\Scopes\WVICore\UserRoleScope;
use App\Util\Constant;

class CustomerDetails extends User {
    protected $table = 'customer_details';

    protected $fillable= ['first_name', 'last_name', 'company_name', 'department', 'designation', 'email', 'phone', 'subscription','customer_type', 'company_id'];

    public function addresses(){
        return $this->hasMany(CustomerAddress::class);
    }
    public function shipping_address(){
        return $this->hasOne(CustomerAddress::class)->where('default_shipping', Constant::YES);
    }
    public function billing_address(){
        return $this->hasOne(CustomerAddress::class)->where('default_billing', Constant::YES);
    }
    public function company(){
        return $this->belongsTo(Company::class);
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function orders(){
        return $this->hasMany(Order::class);
    }
    public function promo_codes(){
        return $this->hasMany(CustomerPromo::class);
    }

    const FORM_DISABLED = [
        'ALL',
    ];

    const CUSTOMER_TYPE = [
        'RETAIL'=>'Retail',
        'BIZ'=>'Biz'
    ];

    const FORM_TYPE = [
        'designation' => 'Text',
        'first_name' => 'Text',
        'last_name' => 'Text',
        'company_name' => 'Text',
        'email' => 'Text',
        'phone' => 'Text',
        'address' => 'TextArea',
        'business_number' => 'Text',
        'customer_type' => 'Select',
    ];

    const INDEX_FIELD = [
        'designation',
        'first_name',
        'last_name',
        'company_name',
        'email',
        'phone',
    ];

    const FORM_SELECT_LIST = [
        'customer_type'=> CustomerDetails::CUSTOMER_TYPE
    ];

    public function scopeEagerLoadAll($query){
        return $query
            ->with('addresses')
            ->with('shipping_address')
            ->with('billing_address')
            ->with('promo_codes')
            ->with('company')
            ->with('orders.order_items')
            ->with('orders.shipping_address')
            ->with('orders.billing_address');
    }

}
