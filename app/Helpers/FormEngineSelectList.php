<?php

use App\Entity\Chef;
use App\Entity\CoursePlace;
use App\Entity\ProductCategory;
use App\Entity\Course;
use App\Entity\BlogCategory;

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

function GetCourseList() {
    $map = [];
    foreach(Course::all() as $item){
        $map[$item->id] = $item->name;
    }
    return $map;
}

function GetBlogCategoryList() {
    $map = [];
    foreach(BlogCategory::all() as $item){
        $map[$item->id] = $item->name;
    }
    return $map;
}