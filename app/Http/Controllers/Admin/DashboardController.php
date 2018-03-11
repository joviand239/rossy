<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\CMSCore\Controller;
use App\Service\CouchSync\CouchbaseService;
use App\Service\OrderCouchbaseService;

class DashboardController extends Controller {
    public function index() {
        return redirect('/admin/cms/Page');
        //CouchbaseService::UpdateCategory();
        //CouchbaseService::DeleteDocById('1500610077225-a63c903d-0058-3e91-8c22-251042cc332d');
    }

}
