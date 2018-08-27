<?php

namespace App\Entity;

use App\Entity\Base\BaseEntity;

class Tag extends BaseEntity {
    protected $table = 'tag';

    const FORM_REQUIRED = [
        'name'
    ];

    const FORM_TYPE = [
        'name' => 'Text',
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
