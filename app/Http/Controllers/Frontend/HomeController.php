<?php

namespace App\Http\Controllers\Frontend;

use App\Entity\Category;

use App\Entity\CMS\WhyGerayPrint;
use App\Entity\Product;

use App\Service\Image\ImageService;

use App\Entity\CMS\Home;


class HomeController extends FrontendController {

    public function index() {
        $page = Home::getPage();

        return view('frontend.home', [
            'page' => $page->json,
        ]);
    }

    public function getMaintenance() {

        return view('frontend.maintenance');
    }
}
