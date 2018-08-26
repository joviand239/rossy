<?php

namespace App\Entity;

use App\CMSTrait\SingleImageTrait;
use App\Entity\Base\BaseEntity;
use App\Entity\User\CustomerDetails;
use App\Util\Constant;


class Course extends BaseEntity {
    use SingleImageTrait;

    protected $table = 'course';

    protected $appends = [
        'permalink',
    ];

    protected $fillable = [
        'name',
        'featuredImage',
        'chefs',
        'coursePlaceId',
        'date',
        'time',
        'quota',
        'price',
        'description',
    ];

    public function chefs(){
        return $this->belongsToMany(Chef::class, 'courseChef');
    }

    public function coursePlace(){
        return $this->hasOne(CoursePlace::class, 'id', 'cousePlaceId');
    }

    const FORM_REQUIRED = ['name'];

    const USE_META_SET = true;

    const FORM_TYPE = [
        'name' => 'Text',
        'featuredImage' => 'Image_1',
        'chefs' => 'FastSelect',
        'coursePlaceId' => 'Select',
        'date' => 'DateRange',
        'time' => 'TimeRange',
        'quota' => 'Number',
        'price' => 'Amount',
        'description' => 'Wysiwyg',
    ];

    const INDEX_FIELD = [
        'name',
        'date',
        'time',
        'chef',
        'price'
    ];
    const FORM_SELECT_LIST = [
        'chefs' => 'GetChefList',
        'coursePlaceId' => 'GetCoursePlaceList'
    ];

    const FORM_LABEL = [
        'coursePlaceId' => 'Place',
    ];

    public function getPermalinkAttribute() {
        return getPermalink($this->name, $this->id);
    }

    public function getValue($key, $listItem, $language){
        if ($key == 'date') {
            if (empty($this->dateFrom) && empty($this->dateTo)) return '';
            return getDateOnly($this->dateFrom). ' - ' . getDateOnly($this->dateTo);
        }
        if ($key == 'time') {
            if (empty($this->timeFrom) && empty($this->timeTo)) return '';
            return getTimeOnly($this->timeFrom). ' - ' . getTimeOnly($this->timeTo);
        }
        if ($key == 'chef') {
            $listName = '';

            foreach ($this->chefs as $key => $chef){
                $listName .= $chef->name;

                if ($key != count($this->chefs)-1) {
                    $listName .= ', ';
                }
            }
            return $listName;
        }


        return parent::getValue($key, $listItem, $language);
    }
}
