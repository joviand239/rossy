<?php

namespace App\Entity;

use App\CMSTrait\SingleImageTrait;
use App\Entity\Base\BaseEntity;
use App\Entity\User\CustomerDetails;
use App\Util\Constant;


class Blog extends BaseEntity {
    use SingleImageTrait;

    protected $table = 'blog';

    protected $appends = [
        'permalink',
    ];

    protected $fillable = [
        'name',
        'featuredImage',
        'thumbnailImage',
        'chefs',
        'blogCategoryId',
        'publishDate',
        'publishTime',
        'summary',
        'description',
    ];

    public function chefs(){
        return $this->belongsToMany(Chef::class, 'blogChef');
    }

    public function category(){
        return $this->hasOne(BlogCategory::class, 'id', 'blogCategoryId');
    }

    const FORM_REQUIRED = ['name'];

    const USE_META_SET = true;

    const FORM_TYPE = [
        'name' => 'Text',
        'featuredImage' => 'Image_1',
        'thumbnailImage' => 'Image_1',
        'chefs' => 'FastSelect',
        'blogCategoryId' => 'Select',
        'publishDate' => 'Date',
        'publishTime' => 'Time',
        'summary' => 'TextArea',
        'description' => 'Wysiwyg',
    ];

    const INDEX_FIELD = [
        'name',
        'date',
        'time',
        'chef',
        'category'
    ];
    const FORM_SELECT_LIST = [
        'chefs' => 'GetChefList',
        'blogCategoryId' => 'GetBlogCategoryList'
    ];

    const FORM_LABEL = [
        'blogCategoryId' => 'Category',
    ];

    public function getPermalinkAttribute() {
        return getPermalink($this->name, $this->id);
    }

    public function getValue($key, $listItem, $language){
        if ($key == 'date') {
            if (empty($this->publishDate)) return '';
            return getDateOnly($this->publishDate);
        }
        if ($key == 'time') {
            if (empty($this->publishTime)) return '';
            return getTimeOnly($this->publishTime);
        }
        if ($key == 'category') {
            return @$this->category->name;
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
