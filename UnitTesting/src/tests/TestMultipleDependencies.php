<?php

use PHPUnit\Framework\TestCase;

class TestMultipleDependencies extends TestCase
{
    public function testFirstDependency(): string
    {
        $this->assertTrue(true);

        return 'first';
    }

    public function testSecondDependency(): string
    {
        $this->assertTrue(true);

        return 'second';
    }

    /**
     * @depends testSecondDependency
     * @depends testFirstDependency
     * */ 
    public function testMultipleDependencies(string $second, string $first): void
    {
        $this->assertSame($first, 'first');
        $this->assertSame($second, 'second');
    }
}