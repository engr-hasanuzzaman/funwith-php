<?php

use App\Todo;
use PHPUnit\Framework\TestCase;

class TodoTest extends TestCase
{
    public function testTodogetIdReturnTheId()
    {
        $todo = new Todo(12);
        $todoReflection = new ReflectionClass(Todo::class);
        $getId = $todoReflection->getMethod('getId');
        $getId->setAccessible(true);
        $result = $getId->invoke($todo);
        $this->assertEquals($result, 12);
    }

    public function testDeafultValueOfid()
    {
        $todo = new Todo;
        $reflectorObj = new ReflectionObject($todo);
        $id = $reflectorObj->getProperty('id');
        $id->setAccessible(true);
        $result = $id->getValue($todo);
        $this->assertEquals($result, 0);
    }
}
