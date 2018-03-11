<?php

namespace App\Http\Controllers;

use App\Entity\Base\Role;
use App\Entity\Base\User;
use App\Entity\Promo;
use App\Entity\User\Customer;
use App\Entity\User\CustomerDetails;
use App\Entity\User\CustomerPromo;
use App\Http\Controllers\CMSCore\Controller;
use App\Service\MailerService;
use App\Util\Constant;
use App\Entity\Order;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

use Validator;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller {

    public function getLoginPage() {
        static::RememberRedirectBackAfterLogin();
        return view('frontend.login');
    }

    public function getLoginCheckoutPage() {
	    static::RememberRedirectBackAfterLogin();
        return view('frontend.login-checkout');
    }

    public function login() {
        $redirect = Session::get('redirectBackAfterLogin');

        $login_from_url = redirect()->back()->gettargeturl();

        $userdata = array(
            'email'     => Input::get('email'),
            'password'  => Input::get('password'),
        );

        $login_email = Input::get('email');

        $auth = User::where('email', $login_email)->with('roles')->first();

        if ($auth == null){
            return Redirect::back()->withErrors(['Username / password salah, mohon ulang kembali.']);
        }else if ($auth->status != 'ACTIVE'){
            return Redirect::back()->withErrors(['Akun belum terverifikasi, silahkan verifikasi terlebih dahulu.']);
        }else if ($auth->roles[0]->name == Constant::USER_ROLE_CUSTOMER){
            if ($login_from_url == route('login.page') || $login_from_url == route('login.checkout')){
                $pass = true;
            }else {
                return Redirect::back()->withErrors(['Username / password salah, mohon ulang kembali.']);
            }
        }else if ($auth->roles[0]->name == Constant::USER_ROLE_CUSTOMERBIZ){
            if ($login_from_url != route('geraybiz.login.page')){
                return Redirect::back()->withErrors(['Username / password salah, mohon ulang kembali.']);
            }
        }

        $input_remember = Input::get('remember');

        if ($input_remember == 'on'){
            setcookie('remember', true, time() + (86400 * 30), "/");
        }else {
            setcookie('remember', false, time() + (86400 * 30), "/");
        }

        Auth::attempt($userdata);

        if (\Auth::isCustomer() || \Auth::isCustomerBiz()) {
            return redirect($redirect);
        }

        return Redirect::back()->withErrors(['Username / password salah, mohon ulang kembali.']);
    }

    public function getRegisterPage() {
	    static::RememberRedirectBackAfterLogin();
	    return view('frontend.register');
    }

    public function createUser() {
        $data = Input::all();
        $referral_code = $data['referral_code'];
        $with_referral_code = false;

        $rules = [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:user',
            'password' => 'required|min:6|confirmed',
        ];

        $validator = Validator::make($data, $rules);

        if($validator->fails()){
            return Redirect::back()->withInput()->withErrors($validator);
        }

        if ($referral_code != ''){
            $customer_referral = CustomerDetails::where('promo_code', $data['referral_code'])->get()->first();

            if ($customer_referral == null){
                $referError = 'Maaf kode referral tidak sesuai dengan data kami!';

                return Redirect::back()->withInput()->withErrors($referError);
            }else {
                $with_referral_code = true;
            }
        }


        $confirmation_code = str_random(30);

        $customer = new Customer();
        $customer->name = $data['name'];
        $customer->email = $data['email'];
        $customer->password = bcrypt($data['password']);
        $customer->status = Customer::STATUS_VERIFY;
        $customer->confirmation_code = $confirmation_code;
        $customer->save();

        $role = new Role();
        $role->user_id = $customer->id;
        $role->name = Constant::USER_ROLE_CUSTOMER;
        $customer->roles()->save($role);

        $name = explode(' ',$data['name'],2);
        $promo_code = str_random(8);

        $customer_details = new CustomerDetails();
        $customer_details->first_name = $name[0];
        $customer_details->last_name = @$name[1];
        $customer_details->email = $data['email'];
        $customer_details->promo_code = $promo_code;
        $customer_details->subscription = 'NO';
        $customer->customer_details()->save($customer_details);

        if ($with_referral_code) {
            $promo = Promo::where('format', 'REFERRAL')->get()->first();


            if ($promo != null) {
                $promo_code_for_new_user = str_random(8);
                $promo_code_for_refer = str_random(8);

                $customer_promo_refer = new CustomerPromo();
                $customer_promo_refer->code = $promo_code_for_refer;
                $customer_promo_refer->referral_id = $customer_details->id;
                $customer_promo_refer->promo_id = $promo->id;
                $customer_promo_refer->status = 'PENDING';
                $customer_promo_refer->type = 'REFERRAL';
                $customer_referral->promo_codes()->save($customer_promo_refer);

                $customer_promo_new_user = new CustomerPromo();
                $customer_promo_new_user->code = $promo_code_for_new_user;
                $customer_promo_new_user->referral_id = $customer_referral->id;
                $customer_promo_new_user->referral_promo_id = $customer_promo_refer->id;
                $customer_promo_new_user->promo_id = $promo->id;
                $customer_promo_new_user->status = 'ACTIVE';
                $customer_promo_new_user->type = 'NEWUSER';
                $customer_details->promo_codes()->save($customer_promo_new_user);




                $customer->promoCode = $promo_code_for_new_user;

                //MailerService::emailPromoCodeForNewUser($customer_details, $promo_code_for_new_user, 'NEW');
                //MailerService::emailPromoCodeForNewUser($customer_promo_refer, $promo_code_for_refer, 'REFER');
            }
        }

        $customer->isWithReferral = $with_referral_code;

        MailerService::verifyAccount($customer);

        return redirect(route('register.success'));
    }

    public function getSuccessPage() {

        return view('frontend.register-success');
    }

    public function verifyAccount($confirmation_code, $promo_code = '') {
        $user = User::where('confirmation_code', $confirmation_code)->get()->first();

        if ($user->status == 'VERIFY'){
            $user->status = Customer::STATUS_ACTIVE;
            $user->save();

            if ($promo_code != ''){
                $user->isWithReferral = true;
                $user->promoCode = $promo_code;
            }else {
                $user->isWithReferral = false;
            }

            MailerService::welcomeUser($user);
            return view('frontend.verify-success');
        }

        return view('frontend.verify-already');
    }

    public function logout() {
	    Session::put('redirectBackAfterLogin', '');

        if (\Auth::isCustomer()) {
            $redirect = redirect()->back();
        }elseif (\Auth::isCustomerBiz()){
            $redirect = redirect()->back();
        }

        \Auth::logout();
        return $redirect;
    }

    private static function RememberRedirectBackAfterLogin(){
	    $redirect_url = redirect()->back()->gettargeturl();

	    if ($redirect_url == route('login')) return;
	    if ($redirect_url == route('login.page')) return;
	    if ($redirect_url == route('login.checkout')) return;
	    if ($redirect_url == route('register')) return;
	    if ($redirect_url == route('register.success')) return;
	    if (strpos($redirect_url, '/register/verify/') !== false) return;
	    if ($redirect_url == route('create.user')) return;

        Session::put('redirectBackAfterLogin', $redirect_url);
    }

    public function getForgotPasswordPage(){


        return view('frontend.forgot-password');
    }

    public function getForgotPasswordBiz(){
        return view('frontend.forgot-password',[
            'page_type' => 'GERAYBIZ_LOGIN'
        ]);
    }

    public function createNewPassword(){
        $data = Input::all();

        $user = User::where('email', $data['email'])->get()->first();

        if ($user != null){
            $new_password = str_random(6);
            $user->password = bcrypt($new_password);
            $user->save();

            MailerService::sendPasswordRecovery($user, $new_password);
        }else {
            $error = 'Maaf '.$data['email'].' tidak terdaftar.';

            return Redirect::back()->withInput()->withErrors($error);
        }


        return Redirect::back()->with('success', true);
    }
}
