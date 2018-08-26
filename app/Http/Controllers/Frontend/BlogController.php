<?php

namespace App\Http\Controllers\Frontend;

use App\Entity\Blog;
use App\Entity\BlogCategory;
use App\Entity\Category;

use App\Entity\CMS\PageBlog;
use App\Entity\CMS\WhyGerayPrint;
use App\Entity\Product;

use App\Service\Image\ImageService;

use App\Entity\CMS\Home;


class BlogController extends FrontendController {

    public function index($permalink = '') {
        $categoryId = 0;

        if ($permalink) {
            $categoryId = parsePermalinkToId($permalink);
        }

        $page = PageBlog::getPage();

        $query = Blog::query();


        if ($categoryId) {
            $query->where('blogCategoryId', $categoryId);
        }

        $list = $query->get();

        $category = BlogCategory::all();

        return view('frontend.blog', [
            'page' => $page->json,
            'list' => $list,
            'category' => $category,
            'categoryId' => $categoryId,
        ]);
    }

    public function getDetail($permalink) {
        $id = parsePermalinkToId($permalink);

        $page = Blog::get($id);

        $nextBlog = Blog::where('blogCategoryId', @$page->blogCategoryId)->take(2)->get();

        return view('frontend.blog-detail', [
            'page' => @$page,
            'nextBlog' => @$nextBlog
        ]);
    }
}
