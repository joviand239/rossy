<?php

namespace App\Entity;

use App\Entity\Base\BaseEntity;


class Partner extends BaseEntity {
    protected $table = 'partner';

    const FORM_TYPE = [
        'name' => 'Text',
        'phone' => 'Text',
        'email' => 'Text',
        'address' => 'TextArea',
        'mapLink' => 'TextArea'
    ];

    const INDEX_FIELD = [
        'name',
        'phone',
        'address',
    ];
    const FORM_SELECT_LIST = [

    ];



    public function getValue($key, $listItem, $language){



        return parent::getValue($key, $listItem, $language);
    }
}
