<?php

namespace App\Http\Controllers\Frontend;

use App\Entity\Category;

use App\Entity\CMS\About;
use App\Entity\CMS\History;
use App\Entity\CMS\WhyGerayPrint;
use App\Entity\Product;

use App\Service\Image\ImageService;

use App\Entity\CMS\Home;


class AboutController extends FrontendController {

    public function index() {
        $page = About::getPage();

        $history = History::getPage();

        return view('frontend.about', [
            'page' => $page->json,
            'history' => $history->json,
        ]);
    }
}
