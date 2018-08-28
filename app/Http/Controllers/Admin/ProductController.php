<?php

namespace App\Http\Controllers\Admin;

use App\Entity\Course;
use App\Entity\CoursePlace;
use App\Entity\Product;
use App\Entity\ProductCategory;
use App\Entity\ProductVarian;
use App\Http\Controllers\CMSCore\Controller;
use App\Service\CMSCore\CRUDService;
use Illuminate\Support\Facades\Input;

class ProductController extends Controller {
    public function index() {
        return view('admin.product.index', ['list'=>Product::all(), 'model'=>Product::class]);
    }
    public function details($id) {

        $model = Product::get($id);

        return view('admin.product.details', [
            'model' => $model,
            'id' => $id,
            'modelVarian' => ProductVarian::class,
        ]);
    }
    public function save($id) {
        $input = (object)Input::all();

        $model = CRUDService::SaveWithData($id, Product::class);

        $model->hasVarian = (isset($input->hasVarian)) ? @$input->hasVarian : @$model->hasVarian;

        $model->price = @$input->price;

        $model->save();

        return redirect(route('admin.products'));
    }
    public function delete($id) {
        $item = Product::find($id);
        if (!empty($item)) $item->delete();
        return redirect(route('admin.products'));
    }
}
