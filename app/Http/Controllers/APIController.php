<?php

namespace App\Http\Controllers;

use App\Entity\Customer;
use App\Http\Controllers\CMSCore\Controller;
use App\Service\CustomerCouchbaseService;
use App\Util\CMSCore\Response;
use Illuminate\Support\Facades\Input;

class APIController extends Controller {
	public function register() {
		$data = Input::all();

		$customer = Customer::where('email', $data['email'])->first();
		if(!empty($customer)) Response::error('Customer with that email already exist');

		$customer = new Customer((array)$data);
		$customer->save();

		CustomerCouchbaseService::CreateCustomer($data['email'], $data['password']);
		Response::success(['msg'=>'Customer created successfully']);
	}

}
