<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class registernotification extends Notification
{
    use Queueable;
    public $message;
    public $subject;
    public $formMail;
    public $mailer;

    public function __construct()
    {
        $this->message = "You Register just  ";
        $this->subject = "TaskMangment company tabeea";
        $this->formMail = "agibokra55@gmail.com";
        $this->mailer = 'smtp';
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->mailer($this->mailer) // استخدم المتغير بدلاً من النص الصلب
            ->from($this->formMail, 'TaskMangment')
            ->subject($this->subject)
            ->greeting('Hello ' . ($notifiable->name ?? 'User'))
            ->line($this->message)
            ->line(' your now invlude company us!');
    }
    

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
