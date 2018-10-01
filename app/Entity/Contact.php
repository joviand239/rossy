<?php

namespace App\Entity;

use App\CMSTrait\SingleImageTrait;
use App\Entity\Base\BaseEntity;
use App\Entity\User\CustomerDetails;
use App\Util\Constant;


class Contact extends BaseEntity {
    use SingleImageTrait;

    protected $table = 'contact';

    const FORM_TYPE = [
        'name' => 'Text',
        'email' => 'Text',
        'phone' => 'Text',
        'description' => 'TextArea',
        'createdAt' => 'Date',
    ];

    const FORM_DISABLED = [
        'name',
        'email',
        'phone',
        'description',
        'createdAt'
    ];

    const INDEX_FIELD = [
        'name',
        'email',
        'phone',
        'description',
        'createdAt'
    ];
    const FORM_SELECT_LIST = [

    ];

    const FORM_LABEL = [

    ];

    public function getValue($key, $listItem, $language){


        return parent::getValue($key, $listItem, $language);
    }
}
