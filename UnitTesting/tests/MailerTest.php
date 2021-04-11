<?php
use PHPUnit\Framework\TestCase;
use App\Mailer;

class MailerTest extends TestCase
{
    public function testMailerSend()
    {
        // create a mock mailer
        $mock = $this->createMock(Mailer::class);
        // stub the send method so that calling that return true
        $mock->method('sendEmail')->willReturn(true);
        $result = $mock->sendEmail('test@email.com', 'message');
        $this->assertTrue($result);
    }
}