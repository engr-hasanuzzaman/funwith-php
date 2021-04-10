<?php
use Queue;
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
        $this->assertEquals(count($this->queue), 0);
    }
}