<?php

namespace App\Notifications;

use Ichtrojan\Otp\Otp;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendOtpNotification extends Notification
{
    use Queueable;

    protected $otp;
    public function __construct()
    {
        $this->otp = new Otp();
    }




    public function via(object $notifiable): array
    {
        return ['mail'];
    }


    public function toMail(object $notifiable): MailMessage
    {
        $token = $this->otp->generate($notifiable->email, 'numeric' ,6,5)->token;
        return (new MailMessage)
            ->view('emails.forget-password', ['otp' => $token]);
    }


    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
