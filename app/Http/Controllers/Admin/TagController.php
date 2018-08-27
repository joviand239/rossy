<?php

namespace App\Http\Controllers\Admin;

use App\Entity\Tag;
use App\Http\Controllers\CMSCore\Controller;
use App\Service\CMSCore\CRUDService;

class TagController extends Controller {
    public function index() {
        return view('admin.tag.index', ['list'=>Tag::all(), 'model'=>Tag::class]);
    }
    public function details($id) {
        return view('admin.tag.details', ['model'=>Tag::get($id), 'id' => $id]);
    }
    public function save($id) {
        $model = CRUDService::SaveWithData($id, Tag::class);

        $model->save();

        return redirect(route('admin.tags'));
    }
    public function delete($id) {
        $item = Tag::find($id);
        if (!empty($item)) $item->delete();
        return redirect(route('admin.tags'));
    }
}
