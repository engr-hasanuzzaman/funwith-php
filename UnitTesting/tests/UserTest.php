<?php

use App\Mailer;
use App\User;
use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\once;

class UserTest extends TestCase
{
    function testNotify()
    {
        $mailer = $this->createMock(Mailer::class);
        // $mailer->expects(once())->method('sendEmail')->willReturn(true) -> sendEmail will call once
        $mailer->expects(once())->method('sendEmail')->willReturn(true);
        $user = new User('test@gm.com');
        $user->setMailer($mailer);
        $this->assertTrue($user->notify());
    }
}