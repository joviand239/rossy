<?php

namespace App\Http\Controllers\Admin;

use App\Entity\Chef;
use App\Entity\Course;
use App\Http\Controllers\CMSCore\Controller;
use App\Service\CMSCore\CRUDService;

class CourseController extends Controller {
    public function index() {
        return view('admin.course.index', ['list'=>Course::all(), 'model'=>Course::class]);
    }
    public function details($id) {
        return view('admin.course.details', ['model'=>Course::get($id), 'id' => $id]);
    }
    public function save($id) {
        $model = CRUDService::SaveWithData($id, Course::class);

        $model->save();

        return redirect(route('admin.courses'));
    }
    public function delete($id) {
        $item = Course::find($id);
        if (!empty($item)) $item->delete();
        return redirect(route('admin.courses'));
    }
}
