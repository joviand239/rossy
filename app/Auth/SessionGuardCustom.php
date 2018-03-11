<?php
namespace App\Auth;

use App\Entity\User\Admin;
use App\Entity\User\Customer;
use App\Entity\User\CustomerBiz;
use Illuminate\Auth\SessionGuard;

class SessionGuardCustom extends SessionGuard {
    public function admin(){
        return Admin::find(parent::id());
    }
    public function isAdmin(){
        return !empty($this->admin());
    }

    public function customerAll() {
        if ($this->isCustomer()){
            return Customer::with(['customer_details.addresses', 'customer_details.shipping_address', 'customer_details.billing_address'])->find(parent::id());
        }elseif ($this->isCustomerBiz()){
            return CustomerBiz::with(['customer_details.addresses', 'customer_details.shipping_address', 'customer_details.billing_address'])->find(parent::id());
        }
    }

    public function customer(){
        return Customer::find(parent::id());
    }
    public function isCustomer(){
        return !empty($this->customer());
    }

    public function customerBiz(){
        return CustomerBiz::find(parent::id());
    }
    public function isCustomerBiz(){
        return !empty($this->customerBiz());
    }
}