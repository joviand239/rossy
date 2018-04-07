<?php

namespace App\Http\Controllers\Admin;

use App\Entity\Course;
use App\Entity\CoursePlace;
use App\Entity\ProductCategory;
use App\Http\Controllers\CMSCore\Controller;
use App\Service\CMSCore\CRUDService;

class ProductcategoryController extends Controller {
    public function index() {
        return view('admin.productcategory.index', ['list'=>ProductCategory::all(), 'model'=>ProductCategory::class]);
    }
    public function details($id) {
        return view('admin.productcategory.details', ['model'=>ProductCategory::get($id), 'id' => $id]);
    }
    public function save($id) {
        $model = CRUDService::SaveWithData($id, ProductCategory::class);

        $model->save();

        return redirect(route('admin.productcategories'));
    }
    public function delete($id) {
        $item = ProductCategory::find($id);
        if (!empty($item)) $item->delete();
        return redirect(route('admin.productcategories'));
    }
}
