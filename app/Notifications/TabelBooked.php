<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TabelBooked extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    private $bookTable;
    private $created_user;
    private $notification_content;
    public function __construct($bookTable,$created_user,$notification_content)
    {
        $this->bookTable = $bookTable;
        $this->created_user = $created_user;
        $this->notification_content = $notification_content;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'bookTable'=> $this->bookTable,
            'created_user'=>$this->created_user,
            'notification_content'=>$this->notification_content
        ];
    }
}
