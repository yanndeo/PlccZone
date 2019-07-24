<?php


namespace App\Helpers\Mail;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Mail\ReplyAutoMailable;

class MailTo {


    /**
     * @param $mailable
     * @return mixed
     */
    public static function sendMailToAdmin($mailable)
    {
        $user_default = config('plccnzone.user_default');
        $user_admin1 =  config('plccnzone.user_admin1');

        return
            Mail::to($user_default)
               // ->cc($user_admin1)
                ->send($mailable);
    }

    /**
     * @param $userFrom
     * @param $when
     * @return mixed
     */
    public static function ReplyAutoToUser($userFrom, $when)
    {
        return
            Mail::to($userFrom)
                ->later($when, new ReplyAutoMailable);
    }

    /**
     * @return \Illuminate\Config\Repository|mixed
     */
    public static function SupportPlatform()
    {
        $mailFrom= config('plccnzone.admin_support_email');

        return $mailFrom ;

    }
    
}