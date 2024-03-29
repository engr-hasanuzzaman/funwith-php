<?php

use App\Mailer;
use App\User;
use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\never;
use function PHPUnit\Framework\once;

class UserTest extends TestCase
{
    function testNotify()
    {
        $mailer = $this->createMock(Mailer::class);
        // $mailer->expects(once())->method('sendEmail')->willReturn(true) -> sendEmail will call once
        // $mailer->expects(never())->method('sendEmail')->willReturn(true); will failed
        $mailer->expects(once())
               ->method('sendEmail')
               ->with($this->equalTo('test@gm.com'), $this->equalTo('Message'))
               ->willReturn(true);
        $user = new User('test@gm.com');
        $user->setMailer($mailer);
        $this->assertTrue($user->notify());
    }
}