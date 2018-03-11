<?php

namespace App\Http\Controllers\Admin;

use App\Entity\Base\Role;
use App\Entity\Base\User;
use App\Http\Controllers\CMSCore\Controller;
use App\Util\CMSCore\CodingConstant;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class AdminController extends Controller {
	public function details($id = -1) {
		Session::put('lastUserUrl', URL::previous());
		return view('cms.user.details', ['model' => \Auth::admin()]);
	}

	public function save($id) {
		$data = \Input::all();
		if (empty($id)) {
			$user = User::where('email', $data['email'])->get();
			if (count($user) > 0) return redirect()->back()->withErrors(['email' => 'User with that email address already exist']);
		}

		if ($id == -1) {
			$user = \Auth::user();
			$user = User::SaveWithData($user->id);
		} else {
			if (!\Auth::isAdmin()) return redirect('/users');
			$user = User::SaveWithData($id);
		}

		if (empty($id)) {
			$user->status = User::STATUS_ACTIVE;
		}

		if (!empty($data['password'])) {
			$user->password = \Hash::make($data['password']);
		}
		$user->save();

		$redirect = Session::get('lastUserUrl');
		return !empty($redirect) ? redirect($redirect) : redirect()->route('admin.home');
	}

}
