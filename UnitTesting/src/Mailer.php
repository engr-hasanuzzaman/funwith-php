<?php
namespace App;

// sample mailer for test mocking
class Mailer
{
    public function send(string $email) 
    {
        sleep(3);
        echo "Email $email has been sent";
        return true;
    }
}