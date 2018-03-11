<?php

namespace App\Entity;

use App\Entity\Base\BaseEntity;
use App\Entity\User\CustomerDetails;
use App\Util\Constant;


class Order extends BaseEntity {
    const DELIVERY_TYPE_REGULAR = 'REGULAR';
    const DELIVERY_TYPE_COLLECT = 'COLLECT';

    protected $table = 'order';

    const FORM_DISABLED = ['date', 'customer'];
    public function customer_details(){
        return $this->belongsTo(CustomerDetails::class);
    }
    public function order_items(){
        return $this->hasMany(OrderItem::class);
    }
    public function shipping_address(){
        return $this->hasOne(OrderAddress::class)->where('default_shipping', Constant::YES);
    }
    public function billing_address(){
        return $this->hasOne(OrderAddress::class)->where('default_billing', Constant::YES);
    }
    public function outlet(){
        return $this->belongsTo(Outlet::class);
    }
    public function order_invoices(){
        return $this->hasMany(OrderInvoice::class);
    }
    public function order_item_custom(){
        return $this->hasOne(OrderItemCustom::class);
    }


    const FORM_TYPE = [
        'order_number' => 'Text',
        'date' => 'Date',
        'status' => 'Select',
    ];

    const INDEX_FIELD = [
        'order_number',
        'date',
        'customer_name',
        'status',
        'grand_total',
        'delivery_type',
    ];
    const FORM_SELECT_LIST = [
        'status'  => 'GetOrderStatus',
    ];

    public function scopeEagerLoadAll($query){
        return $query
            ->with('customer_details')
            ->with('order_items.product')
            ->with('order_items.size')
            ->with('order_items.material')
            ->with('order_items.attributes')
            ->with('order_invoices')
            ->with('order_item_custom')
            ->with('outlet')
            ->with('shipping_address')
            ->with('billing_address');
    }

    public function getValue($key, $listItem, $language){
        if ($key == 'customer_name') {
            if (empty($this->customer_details)) return '';
            return $this->customer_details->first_name . ' ' . $this->customer_details->last_name ;
        }
        if ($key == 'customer_email') {
            if (empty($this->customer_details)) return '';
            return $this->customer_details->email;
        }
        if ($key == 'customer_phone') {
            if (empty($this->customer_details)) return '';
            return $this->customer_details->phone;
        }
        return parent::getValue($key, $listItem, $language);
    }
}
