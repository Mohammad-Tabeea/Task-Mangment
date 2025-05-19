<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SubTaskNotification extends Notification
{
    use Queueable;
    protected $subTask;


    /**
     * Create a new notification instance.
     */
    public function __construct($subTask)
    {
        $this->subTask=$subTask;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toDatabase(object $notifiable)
    {
        return
        [
            'subTask_id' => $this->subTask->id,
            'subTask_name' => $this->subTask->title,
            'message' => 'لقد تم إسناد مهمة فرعية جديدة لك!',
        ];
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
