<?php

namespace App\Http\Controllers\Admin;

use App\Entity\Product;
use App\Entity\ProductVarian;
use App\Http\Controllers\CMSCore\Controller;
use App\Service\CMSCore\CRUDService;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class ProductvarianController extends Controller {

    public function details($parentId, $id = 0) {
        if (!$parentId) return Redirect::back();

        $model = ProductVarian::get($id);

        return view('admin.productvarian.details', ['model'=>$model, 'id' => $id, 'parentId' => $parentId]);
    }

    public function save($parentId, $id) {
        $data = Input::all();

        $parentModel = Product::get($parentId);

        $model = ProductVarian::get($id);

        $model->fill($data);

        $parentModel->varians()->save($model);

        return redirect(route('admin.product', ['id' => $parentId]));
    }

    public function delete($id) {
        $item = ProductVarian::find($id);
        $parentId = $item->productId;
        if (!empty($item)) $item->delete();
        return redirect(route('admin.product', ['id' => $parentId]));
    }
}
