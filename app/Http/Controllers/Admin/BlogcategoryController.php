<?php

namespace App\Http\Controllers\Admin;

use App\Entity\BlogCategory;
use App\Http\Controllers\CMSCore\Controller;
use App\Service\CMSCore\CRUDService;

class BlogcategoryController extends Controller {
    public function index() {
        return view('admin.blogcategory.index', ['list'=>BlogCategory::all(), 'model'=>BlogCategory::class]);
    }
    public function details($id) {
        return view('admin.blogcategory.details', ['model'=>BlogCategory::get($id), 'id' => $id]);
    }
    public function save($id) {
        $model = CRUDService::SaveWithData($id, BlogCategory::class);

        $model->save();

        return redirect(route('admin.blogcategories'));
    }
    public function delete($id) {
        $item = BlogCategory::find($id);
        if (!empty($item)) $item->delete();
        return redirect(route('admin.blogcategories'));
    }
}
