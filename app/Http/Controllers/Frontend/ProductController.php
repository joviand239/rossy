<?php

namespace App\Http\Controllers\Frontend;

use App\Entity\Category;

use App\Entity\CMS\PageProduct;
use App\Entity\CMS\WhyGerayPrint;
use App\Entity\Product;

use App\Entity\ProductCategory;
use App\Service\Image\ImageService;

use App\Entity\CMS\Home;
use App\Util\Constant;


class ProductController extends FrontendController {

    public function getProducts($type = Constant::ALL) {
        $page = PageProduct::getPage();

        $list = [];

        $queryProduct = Product::query();

        if ($type != Constant::ALL) {
            $categoryId = parsePermalinkToId($type);

            $queryProduct->where('productCategoryId', $categoryId);
        }

        $list = $queryProduct->get();

        $categories = ProductCategory::all();

        return view('frontend.product', [
            'page' => $page->json,
            'categories' => @$categories,
            'list' => @$list,
        ]);
    }

    public function getDetail($permalink) {
        $id = parsePermalinkToId($permalink);

        $page = Product::get($id);

        return view('frontend.product-detail', [
            'page' => @$page,
        ]);
    }
}
