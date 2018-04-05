<?php

namespace App\Http\Controllers\Admin;

use App\Entity\Chef;
use App\Http\Controllers\CMSCore\Controller;
use App\Service\CMSCore\CRUDService;

class ChefController extends Controller {
    public function index() {
        return view('admin.chef.index', ['list'=>Chef::all(), 'model'=>Chef::class]);
    }
    public function details($id) {
        return view('admin.chef.details', ['model'=>Chef::get($id), 'id' => $id]);
    }
    public function save($id) {
        $model = CRUDService::SaveWithData($id, Chef::class);

        $model->save();

        return redirect(route('admin.chefs'));
    }
    public function delete($id) {
        $item = Chef::find($id);
        if (!empty($item)) $item->delete();
        return redirect(route('admin.chefs'));
    }
}
