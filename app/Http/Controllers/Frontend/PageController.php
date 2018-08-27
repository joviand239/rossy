<?php

namespace App\Http\Controllers\Frontend;

use App\Entity\Blog;
use App\Entity\CMS\About;
use App\Entity\CMS\History;
use App\Entity\CMS\Home;
use App\Entity\Course;
use App\Entity\Partner;


class PageController extends FrontendController {

    public function getHome() {
        $page = Home::getPage();
        $about = About::getPage();

        $courses = Course::all();

        $blogs = Blog::all();

        return view('frontend.home', [
            'page' => $page->json,
            'about' => $about->json,
            'courses' => @$courses,
            'blogs' => @$blogs
        ]);
    }

    public function getAbout() {
        $page = About::getPage();

        $history = History::getPage();

        return view('frontend.about', [
            'page' => $page->json,
            'history' => $history->json,
        ]);
    }

    public function getContact() {
        $partners = Partner::all();

        return view('frontend.contact', [
            'partners' => @$partners,
        ]);
    }

    public function getMaintenance() {

        return view('frontend.maintenance');
    }
}
