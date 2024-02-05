<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;

class EmailService
{
    public function forgotPassword($mailData=null)
    {
        $mailData['logo'] = config('app.admin_url').'images/logo.svg';
        Mail::send( 'email.forgotPassword',['logo'=>$mailData['logo'],'name'=>$mailData['toName']],function ($message) use ($mailData) {
            $message->from(config('app.MAIL_FROM_ADDRESS'), 'Admin');
            $message->to($mailData['toEmail'],$mailData['toName'])->subject($mailData['subject']);
        });
    }

    public function newUserSignup($mailData=null)
    {
        $mailData['logo'] = config('app.admin_url').'images/logo.svg';
        Mail::send( 'email.newSignup',['logo'=>$mailData['logo'],'name'=>$mailData['toName'],'link'=>$mailData['link']],function ($message) use ($mailData) {
            $message->from(config('app.MAIL_FROM_ADDRESS'), 'Admin');
            $message->to($mailData['toEmail'],$mailData['toName'])->subject($mailData['subject']);
        });
    }

}
