<?php

namespace App\Entity;

use App\Entity\Base\BaseEntity;
use App\Entity\User\CustomerDetails;
use App\Util\Constant;


class Product extends BaseEntity {
    protected $table = 'product';

    public function category(){
        return $this->hasOne(ProductCategory::class);
    }

    const FORM_TYPE = [
        'categoryId' => 'Select',
        'name' => 'Text',
        'featuredImage' => 'Image_1',
        'gallery' => 'Image_0',
        'description' => 'TextArea',
        'dosageInstruction' => 'TextArea',
        'useFor' => 'TextArea',
        'price' => 'Text',
    ];

    const INDEX_FIELD = [
        'category',
        'name',
        'description',
    ];
    const FORM_SELECT_LIST = [
        'categoryId' => 'GetProductCategoryList',
    ];



    public function getValue($key, $listItem, $language){



        return parent::getValue($key, $listItem, $language);
    }
}
