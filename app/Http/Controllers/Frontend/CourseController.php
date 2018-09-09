<?php

namespace App\Http\Controllers\Frontend;

use App\Entity\Booking;
use App\Entity\Category;

use App\Entity\CMS\PageCourse;
use App\Entity\CMS\WhyGerayPrint;
use App\Entity\Course;
use App\Entity\Product;

use App\Service\Image\ImageService;

use App\Entity\CMS\Home;
use Illuminate\Support\Facades\Input;


class CourseController extends FrontendController {

    public function index() {
        $page = PageCourse::getPage();

        $list = Course::all();

        return view('frontend.course', [
            'page' => $page->json,
            'list' => $list
        ]);
    }

    public function getDetail($permalink) {
        $id = parsePermalinkToId($permalink);

        $page = Course::get(@$id);

        return view('frontend.course-detail', [
            'page' => @$page
        ]);
    }

    public function getBooking($permalink) {
        $id = parsePermalinkToId($permalink);

        $page = Course::get(@$id);

        return view('frontend.course-book', [
            'page' => @$page
        ]);
    }

    public function submitBooking($permalink) {
        $input = Input::all();

        $id = parsePermalinkToId($permalink);

        $page = Course::get(@$id);

        $booking = new Booking();
        $booking->fill($input);
        $booking->courseId = $id;
        $booking->save();

        return redirect(route('course-detail', ['permalink' => @$page->permalink]))->with('success', '');
    }
}
