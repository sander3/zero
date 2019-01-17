<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class DeleteAccount extends Notification
{
    use Queueable;

    /**
     * The account deletion link.
     *
     * @var string
     */
    public $link;

    /**
     * Create a new notification instance.
     *
     * @param  string  $link
     * @return void
     */
    public function __construct(string $link)
    {
        $this->link = $link;
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
            ->subject(__('Account deletion'))
            ->line(__('You are receiving this email because we received an account deletion request for your account.'))
            ->action(__('Permanently delete my account'), $this->link)
            ->line(__('If you did not request an account deletion, no further action is required.'));
    }
}
