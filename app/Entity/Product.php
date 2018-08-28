<?php

namespace App\Entity;

use App\Entity\Base\BaseEntity;
use App\Entity\User\CustomerDetails;
use App\Util\Constant;


class Product extends BaseEntity {
    protected $table = 'product';

    protected $appends = [
        'permalink',
    ];

    protected $fillable = [
        'productCategoryId',
        'tags',
        'name',
        'featuredImage',
        'gallery',
        'description',
        'dosageInstruction',
        'useFor',
    ];

    const FORM_REQUIRED = [
        'categoryId',
        'name'
    ];

    const FORM_DISABLED = [
        'hasVarian'
    ];

    const USE_META_SET = true;

    const FORM_TYPE = [
        'productCategoryId' => 'Select',
        'tags' => 'FastSelect',
        'name' => 'Text',
        'featuredImage' => 'Image_1',
        'gallery' => 'Image_0',
        'description' => 'TextArea',
        'dosageInstruction' => 'TextArea',
        'useFor' => 'TextArea',
    ];

    const INDEX_FIELD = [
        'category',
        'name',
        'description',
    ];

    const FORM_LABEL = [
        'productCategoryId' => 'Category',
    ];

    const FORM_SELECT_LIST = [
        'productCategoryId' => 'GetProductCategoryList',
        'tags' => 'GetTagList',
    ];

    public function tags(){
        return $this->belongsToMany(Tag::class, 'productTag');
    }

    public function category(){
        return $this->hasOne(ProductCategory::class, 'id', 'productCategoryId');
    }

    public function varians(){
        return $this->hasMany(ProductVarian::class, 'productId', 'id');
    }

    public function getPermalinkAttribute() {
        return getPermalink($this->name, $this->id);
    }

    public function getValue($key, $listItem, $language){
        if ($key == 'category') {
            return @$this->category->name;
        }


        return parent::getValue($key, $listItem, $language);
    }
}
