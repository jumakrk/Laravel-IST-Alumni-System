<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class JobApplicationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $applicationData;

    /**
     * Create a new message instance.
     *
     * @param array $applicationData
     * @return void
     */
    public function __construct($applicationData)
    {
        $this->applicationData = $applicationData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.job_application')
                    ->with([
                        'name' => $this->applicationData['name'],
                        'email' => $this->applicationData['email'],
                        'phone' => $this->applicationData['phone'],
                        'cover_letter' => $this->applicationData['cover_letter'],
                        'cv_url' => $this->applicationData['cv_url'],
                    ])
                    ->subject('New Job Application Received');
    }
}
