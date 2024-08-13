<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

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
        return (new MailMessage)->view(
            'emails.job_posted', ['job' => $this->job, 'user' => $notifiable]
        );
    }

    public function toArray($notifiable)
    {
        return [
            'job_id' => $this->job->id,
            'message' => 'A job matching your major has been posted. Would you like to view it?',
        ];
    }
}
