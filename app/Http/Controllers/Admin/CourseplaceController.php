<?php

namespace App\Http\Controllers\Admin;

use App\Entity\Course;
use App\Entity\CoursePlace;
use App\Http\Controllers\CMSCore\Controller;
use App\Service\CMSCore\CRUDService;

class CourseplaceController extends Controller {
    public function index() {
        return view('admin.courseplace.index', ['list'=>CoursePlace::all(), 'model'=>CoursePlace::class]);
    }
    public function details($id) {
        return view('admin.courseplace.details', ['model'=>CoursePlace::get($id), 'id' => $id]);
    }
    public function save($id) {
        $model = CRUDService::SaveWithData($id, CoursePlace::class);

        $model->save();

        return redirect(route('admin.courseplaces'));
    }
    public function delete($id) {
        $item = CoursePlace::find($id);
        if (!empty($item)) $item->delete();
        return redirect(route('admin.courseplaces'));
    }
}
