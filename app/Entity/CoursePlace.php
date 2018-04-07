<?php

namespace App\Entity;

use App\Entity\Base\BaseEntity;
use App\Entity\User\CustomerDetails;
use App\Util\Constant;


class CoursePlace extends BaseEntity {
    protected $table = 'coursePlace';

    const FORM_REQUIRED = ['name'];

    const FORM_TYPE = [
        'name' => 'Text',
        'address' => 'TextArea',
        'phone' => 'Text',
    ];

    const INDEX_FIELD = [
        'name',
        'address',
        'phone',
    ];
    const FORM_SELECT_LIST = [

    ];



    public function getValue($key, $listItem, $language){



        return parent::getValue($key, $listItem, $language);
    }
}
