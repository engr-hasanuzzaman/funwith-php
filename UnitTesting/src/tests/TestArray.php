<?php
use PHPUnit\Framework\TestCase;

class TestArray extends TestCase{
    public function testStackIsEmpty()
    {
        $stack = [];
        $this->assertSame(count($stack), 0);

        return $stack;
    }

    /**
     * @depends testStackIsEmpty
     * */ 
    public function testPushElements(array $stack)
    {
        array_push($stack, "first elemen");
        $this->assertSame(count($stack), 1);

        return $stack;
    }
}
