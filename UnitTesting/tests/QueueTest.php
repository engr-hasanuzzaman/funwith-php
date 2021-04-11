<?php
use App\Queue;
use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase
{
    protected static $queue;

    // heavy setup before running the test functions
    public static function setUpBeforeClass(): void
    {
        static::$queue =  new Queue;
    }

    // release the resouces
    public static function tearDownAfterClass(): void
    {
        static::$queue = null;
    }

    // will be run before test functions
    protected function setUp(): void
    {
        static::$queue->clear();    
    }

    public function testInitialSizeIsZero()
    {
        $this->assertEquals(static::$queue->getCount(), 0);
    }

    public function testPushMethod()
    {
        static::$queue->push(1);
        $this->assertEquals(static::$queue->getCount(), 1);
        static::$queue->push(2);
        $this->assertEquals(static::$queue->top(), 1);
    }

    public function testPopMethod()
    {
        static::$queue->push(1);
        static::$queue->push(2);
        static::$queue->push(3);
        $this->assertEquals(static::$queue->pop(), 1);
        $this->assertEquals(static::$queue->pop(), 2);
        $this->assertEquals(static::$queue->pop(), 3);
        $this->assertEquals(static::$queue->pop(), null);
    }
}