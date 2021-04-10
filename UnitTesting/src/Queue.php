<?php

class Queue
{
    protected $elements = [];

    public function push($elm)
    {
        array_unshift($elm); 
    }

    public function pop()
    {
        return array_pop($this->elements);
    }

    public function top()
    {
        return $this->elements[count($this->elements)];
    }
}