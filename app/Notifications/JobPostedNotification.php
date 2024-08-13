<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class JobPostedNotification extends Notification
{
    use Queueable;

    protected $job;

    public function __construct($job)
    {
        $this->job = $job;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('New Job Matching Your Major')
            ->line('A job matching your major has been posted. Would you like to view it?')
            ->action('View Job', url(route('jobs.show', $this->job->id)))
            ->line('Thank you for using our application!');
    }

    public function toArray($notifiable)
    {
        return [
            'job_id' => $this->job->id,
            'message' => 'A job matching your major has been posted. Would you like to view it?',
        ];
    }
}
