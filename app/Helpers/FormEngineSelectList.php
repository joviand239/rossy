<?php

use App\Entity\Chef;
use App\Entity\CoursePlace;
use App\Entity\ProductCategory;


function GetChefList() {
    $map = [];
    foreach(Chef::all() as $item){
        $map[$item->id] = $item->name;
    }
    return $map;
}

function GetCoursePlaceList() {
    $map = [];
    foreach(CoursePlace::all() as $item){
        $map[$item->id] = $item->name;
    }
    return $map;
}

function GetProductCategoryList() {
    $map = [];
    foreach(ProductCategory::all() as $item){
        $map[$item->id] = $item->name;
    }
    return $map;
}