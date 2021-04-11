<?php

namespace App;

use RuntimeException;

class Queue
{
    protected $elements = [];

    public function push($elm)
    {
        array_unshift($this->elements, $elm);
    }

    public function pop()
    {
        if ($this->isEmpty()) {
            return new RuntimeException('Queue is empty');
        }

        return array_pop($this->elements);
    }

    public function top()
    {
        return end($this->elements);
    }

    public function getCount()
    {
        return count($this->elements);
    }

    public function clear()
    {
        $this->elements = [];
    }

    public function isEmpty()
    {
        return empty($this->elements);
    }
}
