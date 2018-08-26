<?php

namespace App\Http\Controllers\Admin;

use App\Entity\Blog;
use App\Http\Controllers\CMSCore\Controller;
use App\Service\CMSCore\CRUDService;

class BlogController extends Controller {
    public function index() {
        return view('admin.blog.index', ['list'=>Blog::all(), 'model'=>Blog::class]);
    }
    public function details($id) {
        return view('admin.blog.details', ['model'=>Blog::get($id), 'id' => $id]);
    }
    public function save($id) {
        $model = CRUDService::SaveWithData($id, Blog::class);

        $model->save();

        return redirect(route('admin.blogs'));
    }
    public function delete($id) {
        $item = Blog::find($id);
        if (!empty($item)) $item->delete();
        return redirect(route('admin.blogs'));
    }
}
