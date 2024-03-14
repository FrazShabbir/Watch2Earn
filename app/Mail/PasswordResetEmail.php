<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PasswordResetEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $name;
    public $password;
    public $email;

    /**
     * Create a new message instance.
     */
    public function __construct($name, $password,$email)
    {
        $this->name = $name;
        $this->password = $password;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject(config('app.name').': Password Reset Email')
            ->view('backend.email_templates.password_reset')
            ->with([
                'name' => $this->name,
                'password' => $this->password,
                'email' => $this->email
            ]);
    }
}
