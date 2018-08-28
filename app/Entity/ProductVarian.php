<?php

namespace App\Entity;

use App\Entity\Base\BaseEntity;
use App\Entity\User\CustomerDetails;
use App\Util\Constant;


class ProductVarian extends BaseEntity {
    protected $table = 'productVarian';

    const FORM_REQUIRED = ['name'];

    const FORM_TYPE = [
        'name' => 'Text',
        'price' => 'Amount',
    ];

    const INDEX_FIELD = [
        'name',
        'price',
    ];

    const FORM_SELECT_LIST = [

    ];

    public function product(){
        return $this->belongsTo(Product::class, 'id');
    }

    public function getValue($key, $listItem, $language){



        return parent::getValue($key, $listItem, $language);
    }

    public function getSaveUrl($parentid, $id) {
        return route('admin.productvarian', ['parentId' => $parentid, 'id' => $id]);
    }

    public function getCancelUrl($id) {
        return route('admin.'.strtolower(Product::getClassName()), ['id'=>$id]);
    }
}
