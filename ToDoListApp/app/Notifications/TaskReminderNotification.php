<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;

class TaskReminderNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $todo;

    /**
     * Create a new notification instance.
     */
    public function __construct($todo)
    {
        $this->todo = $todo;
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
        Log::info('Sending Task Reminder Notification', ['task_id' => $this->todo->id, 'user_email' => $notifiable->email]);
        return (new MailMessage)
            ->subject('Task Reminder: ' . $this->todo->title)
            ->line('This is a reminder for your task: "' . $this->todo->title . '".')
            ->line('Description: ' . $this->todo->description)
            ->line('Priority: ' . ucfirst($this->todo->priority))
            ->line('End Date: ' . $this->todo->end_date)
            ->line('Please make sure to complete it on time.')
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
            //
        ];
    }
}
