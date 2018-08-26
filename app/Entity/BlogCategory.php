<?php

namespace App\Entity;

use App\Entity\Base\BaseEntity;
use App\Entity\User\CustomerDetails;
use App\Util\Constant;


class BlogCategory extends BaseEntity {
    protected $table = 'blogCategory';

    protected $appends = [
        'permalink',
    ];

    protected $fillable = [
        'name'
    ];

    public function blogs(){
        return $this->hasMany(Course::class, 'courseChef');
    }

    const FORM_REQUIRED = ['name'];

    const TITLE_INDEX = 'Category';

    const TITLE_DETAILS = 'Category Details';

    const FORM_TYPE = [
        'name' => 'Text',
    ];

    const INDEX_FIELD = [
        'name',
    ];
    const FORM_SELECT_LIST = [

    ];

    public function getPermalinkAttribute() {
        return getPermalink($this->name, $this->id);
    }

    public function getValue($key, $listItem, $language){

        return parent::getValue($key, $listItem, $language);
    }
}
