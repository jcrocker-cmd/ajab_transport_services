<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BookingNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($car_id, $booking_id, $user_id)
    {
        $this->car_id = $car_id;
        $this->booking_id = $booking_id;
        $this->user_id = $user_id;
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
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
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
            'car_id' => $this->car_id,
            'booking_id' => $this->booking_id,
            'user_id' => $this->user_id,
        ];
    }
    

    public function toDatabase($notifiable)
    {
        return [
            'car_id' => $this->car_id,
            'booking_id' => $this->booking_id,
            'user_id' => $this->user_id,
        ];
    }

    
}
