<?php

namespace App\Http\Controllers\Frontend;

use App\Entity\Category;

use App\Entity\CMS\PageCourse;
use App\Entity\CMS\WhyGerayPrint;
use App\Entity\Product;

use App\Service\Image\ImageService;

use App\Entity\CMS\Home;


class CourseController extends FrontendController {

    public function index() {
        $page = PageCourse::getPage();

        return view('frontend.course', [
            'page' => $page->json
        ]);
    }

    public function getDetail() {

        return view('frontend.course-detail');
    }

    public function getBooking() {

        return view('frontend.course-book');
    }
}
