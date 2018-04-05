<?php

namespace App\Http\Controllers\Frontend;

use App\Entity\Category;

use App\Entity\CMS\PageBlog;
use App\Entity\CMS\WhyGerayPrint;
use App\Entity\Product;

use App\Service\Image\ImageService;

use App\Entity\CMS\Home;


class BlogController extends FrontendController {

    public function index() {
        $page = PageBlog::getPage();

        return view('frontend.blog', [
            'page' => $page->json,
        ]);
    }

    public function getDetail() {

        return view('frontend.blog-detail');
    }
}
