<?php
use PHPUnit\Framework\TestCase;

class TestArray extends TestCase{
    public function testStackIsEmpty()
    {
        $stack = [];
        $this->assertSame(count($stack), 0);

        return $stack;
    }
}
