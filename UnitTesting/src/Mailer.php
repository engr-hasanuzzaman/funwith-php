<?php
namespace App;

// sample mailer for test mocking
class Mailer
{
    public function sendEmail(string $email, string $message) 
    {
        sleep(3);
        echo "Email $email has been sent with message $message";
        return true;
    }
}