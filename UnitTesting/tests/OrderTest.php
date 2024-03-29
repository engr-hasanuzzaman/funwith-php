<?php

use App\Order;
use Mockery\Adapter\Phpunit\MockeryTestCase;

class OrderTest extends MockeryTestCase
{
    public function testProcess(): void
    {
        // mocking PaymentService that does not exist and add method pay
        $paymenService = $this->getMockBuilder(\stdClass::class)
            ->addMethods(['pay'])
            ->getMock();

        // stubbing the pay method that will receive 1.0 as the parameter and return true
        $paymenService->expects($this->once())
            ->method('pay')
            ->with($this->equalTo(1.0))
            ->willReturn(true);
        $order = new Order($paymenService);
        $order->setPrice(1);
        $this->assertTrue($order->process());
    }

    public function testProcessWithMockery()
    {
        $paymenService = Mockery::mock('PaymentService');
        $paymenService->shouldReceive('pay')
            ->times(1)
            ->andReturn(true);
        $order = new Order($paymenService);
        $order->setPrice(1);
        $this->assertTrue($order->process());
    }
}
