<?php

namespace App\Entity;

use App\Entity\Base\BaseEntity;
use App\Entity\User\CustomerDetails;
use App\Util\Constant;


class ProductCategory extends BaseEntity {
    protected $table = 'productCategory';

    const FORM_REQUIRED = [
        'name'
    ];

    const FORM_TYPE = [
        'name' => 'Text',
        'logo' => 'Image_1',
        'description' => 'TextArea'
    ];

    const INDEX_FIELD = [
        'name',
        'description',
    ];
    const FORM_SELECT_LIST = [

    ];



    public function getValue($key, $listItem, $language){



        return parent::getValue($key, $listItem, $language);
    }
}
