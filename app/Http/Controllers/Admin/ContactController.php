<?php

namespace App\Http\Controllers\Admin;

use App\Entity\Contact;
use App\Http\Controllers\CMSCore\Controller;
use App\Service\CMSCore\CRUDService;

class ContactController extends Controller {
    public function index() {
        return view('admin.contact.index', ['list'=>Contact::all(), 'model'=>Contact::class]);
    }
    public function details($id) {
        return view('admin.contact.details', ['model'=>Contact::get($id), 'id' => $id]);
    }
    public function save($id) {
        $model = CRUDService::SaveWithData($id, Contact::class);

        $model->save();

        return redirect(route('admin.contacts'));
    }
    public function delete($id) {
        $item = Contact::find($id);
        if (!empty($item)) $item->delete();
        return redirect(route('admin.contacts'));
    }
}
