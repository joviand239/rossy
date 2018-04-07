<?php

namespace App\Http\Controllers\Admin;

use App\Entity\Course;
use App\Entity\CoursePlace;
use App\Entity\Product;
use App\Entity\ProductCategory;
use App\Http\Controllers\CMSCore\Controller;
use App\Service\CMSCore\CRUDService;

class ProductController extends Controller {
    public function index() {
        return view('admin.product.index', ['list'=>Product::all(), 'model'=>Product::class]);
    }
    public function details($id) {
        return view('admin.product.details', ['model'=>Product::get($id), 'id' => $id]);
    }
    public function save($id) {
        $model = CRUDService::SaveWithData($id, Product::class);

        $model->save();

        return redirect(route('admin.products'));
    }
    public function delete($id) {
        $item = Product::find($id);
        if (!empty($item)) $item->delete();
        return redirect(route('admin.products'));
    }
}
