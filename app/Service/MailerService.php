<?php
namespace App\Service;



use Illuminate\Support\Facades\Mail;
use App\Entity\User\CustomerDetails;
use App\Entity\User\CustomerPromo;

class MailerService {


    public static function ResetPassword($emailTo, $password){
        $details = [
            'email' => $emailTo,
            'password' => $password
        ];

        try {
            Mail::send('public.email.reset_password', $details,
                function ($message) use ($emailTo) {
                    $message
                        ->to($emailTo)
                        ->from(env('MAIL_FROM_ADDRESS'))
                        ->subject('[Geray Print] Password Reset');
                });
        }catch(\Exception $msg){
            \Log::error($msg);
        }

    }
}
