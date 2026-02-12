<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewOrderNotification extends Notification
{
    use Queueable;

    public $order;

    public function __construct($order)
    {
        $this->order = $order;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('New Order #' . $this->order->order_number)
            ->line('You have a new order!')
            ->line('Order Number: ' . $this->order->order_number)
            ->line('Total: $' . number_format($this->order->total, 2))
            ->action('View Order', url('/orders/' . $this->order->id))
            ->line('Thank you for your business!');
    }
}
