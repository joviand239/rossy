<?php

namespace App\Entity;

use App\Entity\Base\BaseEntity;
use App\Entity\User\CustomerDetails;
use App\Util\Constant;


class Chef extends BaseEntity {
    protected $table = 'chef';

    public function courses(){
        return $this->belongsToMany(Course::class, 'courseChef');
    }

    const FORM_REQUIRED = ['name'];

    const FORM_TYPE = [
        'name' => 'Text',
        'picture' => 'Image_1',
        'phone' => 'Text',
        'email' => 'Text',
        'address' => 'TextArea',
        'description' => 'Wysiwyg'
    ];

    const INDEX_FIELD = [
        'name',
        'phone',
        'email',
    ];
    const FORM_SELECT_LIST = [

    ];



    public function getValue($key, $listItem, $language){



        return parent::getValue($key, $listItem, $language);
    }
}
