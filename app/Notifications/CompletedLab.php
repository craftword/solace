<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CompletedLab extends Notification
{
    use Queueable;
    private $roleId;
    private $lab;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($role, $lab)
    {
        //
         $this->roleId = $role;
         $this->lab = $lab;
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
            //
            'message' => $this->lab .' in waiting',
            'roleId' => $this->roleId
        ];
    }
}
