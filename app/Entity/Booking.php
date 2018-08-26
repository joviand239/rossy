<?php

namespace App\Entity;

use App\CMSTrait\SingleImageTrait;
use App\Entity\Base\BaseEntity;
use App\Entity\User\CustomerDetails;
use App\Util\Constant;


class Booking extends BaseEntity {
    use SingleImageTrait;

    protected $table = 'booking';

    public function course(){
        return $this->hasOne(Course::class, 'id', 'courseId');
    }

    const FORM_REQUIRED = [];

    const FORM_DISABLED = [
        'courseId',
        'name',
        'email',
        'phoneNumber',
        'notes',
    ];

    const FORM_TYPE = [
        'courseId' => 'Select',
        'name' => 'Text',
        'email' => 'Text',
        'phoneNumber' => 'Text',
        'notes' => 'TextArea',
    ];

    const INDEX_FIELD = [
        'course',
        'name',
        'email',
        'phoneNumber',
        'notes'
    ];
    const FORM_SELECT_LIST = [
        'courseId' => 'GetCourseList',
    ];

    const FORM_LABEL = [
        'courseId' => 'Course',
    ];

    public function getValue($key, $listItem, $language){
        if ($key == 'course') {
            return @$this->course->name;
        }


        return parent::getValue($key, $listItem, $language);
    }
}
