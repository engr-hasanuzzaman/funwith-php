<?php
namespace App;

class User
{
    protected $mailer;
    protected $email;

    public function __construct(string $email) {
        $this->email = $email;
    }

    public function setMailer($mailer)
    {
        $this->mailer = $mailer;
    }

    public function notify()
    {
        $this->mailer->sendEmail($this->email, "Message");
    }
}