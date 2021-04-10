<?php
namespace App;
class Queue
{
    protected $elements = [];

    public function push($elm)
    {
        array_unshift($this->elements, $elm); 
    }

    public function pop()
    {
        return array_pop($this->elements);
    }

    public function top()
    {
        return $this->elements[count($this->elements)];
    }

    public function getCount()
    {
        return count($this->elements);
    }
}