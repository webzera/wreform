<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

use App\Models\Opinion;

class OpinionNotification extends Notification
{
    use Queueable;

    public $opinion;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Opinion $opinion)
    {
        $this->opinion = $opinion;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
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
                    ->subject('New Opinion From WRF Site')
                    ->line('New User send the opiniion of the World Reform Foundation Website - Notification.')
                    ->line('Name : '.$this->opinion->name)
                    ->line('Email : '.$this->opinion->email)
                    ->line('Opinion : '.$this->opinion->opinion)
                    ->line('Country : '.$this->opinion->country_name)
                    ->action('View Opinion', url('/admin'))
                    ->line('Thank you!');
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
            'heading' => 'Opinion',
            'name' => $this->opinion->name,
            'email' => $this->opinion->email,
            'opinion' => $this->opinion->opinion,
            'country' => $this->opinion->country_name,
        ];
    }
}
