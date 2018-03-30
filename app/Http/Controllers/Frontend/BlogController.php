<?php

namespace App\Http\Controllers\Frontend;

use App\Entity\Category;

use App\Entity\CMS\WhyGerayPrint;
use App\Entity\Product;

use App\Service\Image\ImageService;

use App\Entity\CMS\Home;


class BlogController extends FrontendController {

    public function index() {

        return view('frontend.blog');
    }

    public function getDetail() {

        return view('frontend.blog-detail');
    }
}
