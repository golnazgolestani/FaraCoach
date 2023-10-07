<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LoginWithCode extends Notification
{
    use Queueable;
    public $code;
    public $email;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($email,$code)
    {
        $this->email=$email;
        $this->code=$code;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line(' کد یکبار مصرف جهت ورود به سایت فراکوچ: '.$this->code)
//                    ->action('Notification Action', url('/'))
                    ->line('ممنون از اینکه ما رو دنبال میکنید!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        dd('AAAA');
        return [];
    }
}
