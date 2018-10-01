<?php
namespace App\Service;

use App\Entity\Setting;
use Illuminate\Support\Facades\Mail;
use App\Entity\User\CustomerPromo;

class MailerService {


    public static function contact($data){
        $details = [
            'data' => @$data,
        ];

        $emailTo = getSettingAttribute('contactEmail');

        try {
            Mail::send('email.contact', $details,
                function ($message) use ($emailTo) {
                    $message
                        ->to($emailTo)
                        ->from(env('MAIL_FROM_ADDRESS'))
                        ->subject('[Rossy] Contact Form');
                });
        }catch(\Exception $msg){
            \Log::error($msg);
        }

    }
}
