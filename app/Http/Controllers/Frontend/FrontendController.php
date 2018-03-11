<?php

namespace App\Http\Controllers\Frontend;



use App\Entity\Organization;
use App\Http\Requests\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\CMSCore\Controller;
use App\Service\Image\ImageService;


class FrontendController extends Controller {


    public function __construct() {
        $data = Input::all();

        if (Cookie::get('remember')) {
            \Config::set('session.expire_on_close', false);
        }else {
            \Config::set('session.expire_on_close', true);
        }

        $selectedLanguage = 'en';
        $selectedService = '';
        $selectedWhen = '';
        
        $language = Config::get('cms.LANGUAGE');


        if (isset($data['lang']) && count(preg_grep( "/".$data['lang']."/i" , $language)) > 0){
            $selectedLanguage = $data['lang'];
        }

        if (isset($data['select-service'])){
            $selectedService = $data['select-service'];
        }

        if (isset($data['select-when'])){
            $selectedWhen = $data['select-when'];
        }

        config(['selectedLanguage' => $selectedLanguage, 'selectedService' => $selectedService, 'selectedWhen' => $selectedWhen]);
    }


    public function index() {


    }
}
