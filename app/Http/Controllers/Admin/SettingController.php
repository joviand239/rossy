<?php

namespace App\Http\Controllers\Admin;

use App\Entity\Blog;
use App\Entity\Setting;
use App\Http\Controllers\CMSCore\Controller;
use App\Service\CMSCore\CRUDService;

class SettingController extends Controller {

    public function details() {
        $model = Setting::first();

        if (!$model) {
            return redirect()->back();
        }

        return view('admin.setting.details', ['model'=>$model, 'id' => $model->id]);
    }
    public function save($id) {
        $model = CRUDService::SaveWithData($id, Setting::class);

        $model->save();

        return redirect(route('admin.setting'))->with('success');
    }
}
