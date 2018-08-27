<?php

namespace App\Http\Controllers\Admin;

use App\Entity\Chef;
use App\Entity\Partner;
use App\Http\Controllers\CMSCore\Controller;
use App\Service\CMSCore\CRUDService;

class PartnerController extends Controller {
    public function index() {
        return view('admin.partner.index', ['list'=>Partner::all(), 'model'=>Partner::class]);
    }
    public function details($id) {
        return view('admin.partner.details', ['model'=>Partner::get($id), 'id' => $id]);
    }
    public function save($id) {
        $model = CRUDService::SaveWithData($id, Partner::class);

        $model->save();

        return redirect(route('admin.partners'));
    }
    public function delete($id) {
        $item = Partner::find($id);
        if (!empty($item)) $item->delete();
        return redirect(route('admin.partners'));
    }
}
