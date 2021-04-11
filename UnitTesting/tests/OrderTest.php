<?php

use App\Order;
use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase
{
    // mocking PaymentService
    public function testProcess(): void
    {
        $paymenService = $this->getMockBuilder(\stdClass::class)
            ->addMethods(['pay'])
            ->getMock();
        $order = new Order($paymenService);
        $this->assertTrue($order->process());
    }
}
