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
}