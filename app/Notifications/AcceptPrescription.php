<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\User;

class AcceptPrescription extends Notification
{
    use Queueable;
    public $total;

    /**
     * Create a new notification instance.
     */
    public function __construct($total)
    {
        $this->total = $total;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('Prescription Amount Notification')
                    ->markdown('mail.EmailNotification')
                    ->line('Your Prescription Total Amount is {$this->total}')
                    ->action('Accept', url('email_accept'))
                    ->line('Thank you for using our application!');
                    
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'total' => $this->total['total'],
            'prescription_id' => $this->total['prescription_id'],
        ];
    }
}
