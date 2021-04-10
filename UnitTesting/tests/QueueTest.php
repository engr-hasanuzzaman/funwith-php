<?php
use App\Queue;
use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase
{
    protected $queue;

    protected function setUp(): void
    {
        $this->queue = new Queue;    
    }

    public function testInitialSizeIsZero()
    {
        $this->assertEquals($this->queue->getCount(), 0);
    }

    public function testPushMethod()
    {
        $this->queue->push(1);
        $this->assertEquals($this->queue->getCount(), 1);
        $this->queue->push(2);
        $this->assertEquals($this->queue->top(), 1);
    }

    public function testPopMethod()
    {
        $this->queue->push(1);
        $this->queue->push(2);
        $this->queue->push(3);
        $this->assertEquals($this->queue->pop(), 1);
        $this->assertEquals($this->queue->pop(), 2);
        $this->assertEquals($this->queue->pop(), 3);
        $this->assertEquals($this->queue->pop(), null);
    }
}