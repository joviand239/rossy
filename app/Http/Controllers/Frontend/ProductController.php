<?php

namespace App\Http\Controllers\Frontend;

use App\Entity\Category;

use App\Entity\CMS\PageProduct;
use App\Entity\CMS\WhyGerayPrint;
use App\Entity\Product;

use App\Service\Image\ImageService;

use App\Entity\CMS\Home;


class ProductController extends FrontendController {

    public function index() {
        $page = PageProduct::getPage();

        return view('frontend.product', [
            'page' => $page->json
        ]);
    }

    public function getDetail() {

        return view('frontend.product-detail');
    }
}
